<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\SetupIntent;
use Stripe\PaymentMethod;
use Illuminate\Http\Request;

class CompanyPaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $company = auth('company')->user();

        Stripe::setApiKey(config('services.stripe.secret'));

        if (!$company->stripe_customer_id) {
            return view('company.payment_method.index', [
                'paymentMethods' => [],
                'defaultPaymentMethod' => null,
            ]);
        }

        try {
            $customer = Customer::retrieve($company->stripe_customer_id);

            $paymentMethods = PaymentMethod::all([
                'customer' => $company->stripe_customer_id,
                'type' => 'card',
            ]);

            $defaultPaymentMethod = $customer->invoice_settings->default_payment_method;

            return view('company.payment_method.index', [
                'paymentMethods' => $paymentMethods->data,
                'defaultPaymentMethod' => $defaultPaymentMethod,
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            if ($e->getHttpStatus() === 404 || str_contains($e->getMessage(), 'No such customer')) {
                $company->update([
                    'stripe_customer_id' => null,
                    'stripe_payment_method_id' => null,
                ]);

                return view('company.payment_method.index', [
                    'paymentMethods' => [],
                    'defaultPaymentMethod' => null,
                    'error' => 'Your Stripe customer record was not found. Please add a new payment method.'
                ]);
            }
            throw $e;
        }
    }

    public function create()
    {
        $company = auth('company')->user();

        if (!$company) {
            abort(403);
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        if (!$company->stripe_customer_id) {
            $customer = \Stripe\Customer::create([
                'email' => $company->email,
                'name'  => $company->name,
            ]);

            $company->stripe_customer_id = $customer->id;
            $company->save();
        }

        $setupIntent = \Stripe\SetupIntent::create([
            'customer' => $company->stripe_customer_id,
        ]);

        return view('company.payment_method.create', [
            'clientSecret' => $setupIntent->client_secret
        ]);
    }

    public function setDefault(Request $request)
    {
        $request->validate([
            'payment_method_id' => 'required|string',
        ]);

        $company = auth('company')->user();

        Stripe::setApiKey(config('services.stripe.secret'));

        Customer::update($company->stripe_customer_id, [
            'invoice_settings' => [
                'default_payment_method' => $request->payment_method_id,
            ],
        ]);

        $company->stripe_payment_method_id = $request->payment_method_id;
        $company->save();

        return back()->with('success', 'Default payment method updated.');
    }

    public function destroy(Request $request, $id)
    {
        $company = auth('company')->user();

        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentMethod = PaymentMethod::retrieve($id);

        $paymentMethod->detach();

        return back()->with('success', 'Payment method removed.');
    }

    public function createSetupIntent()
    {
        $company = auth('company')->user();

        if (!$company) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        if (!$company->stripe_customer_id) {
            $customer = Customer::create([
                'email' => $company->email,
                'name'  => $company->name,
            ]);

            $company->stripe_customer_id = $customer->id;
            $company->save();
        }

        $setupIntent = SetupIntent::create([
            'customer' => $company->stripe_customer_id,
        ]);

        return response()->json([
            'client_secret' => $setupIntent->client_secret
        ]);
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'payment_method_id' => 'required|string'
        ]);

        $company = auth('company')->user();

        if (!$company) {
            abort(403);
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {

            \Stripe\PaymentMethod::retrieve($request->payment_method_id)
                ->attach([
                    'customer' => $company->stripe_customer_id,
                ]);

            $customer = \Stripe\Customer::retrieve($company->stripe_customer_id);

            if (!$customer->invoice_settings->default_payment_method) {

                \Stripe\Customer::update($company->stripe_customer_id, [
                    'invoice_settings' => [
                        'default_payment_method' => $request->payment_method_id,
                    ],
                ]);

                $company->stripe_payment_method_id = $request->payment_method_id;
                $company->save();
            }

            return redirect()
                ->route('company.payment-methods.index')
                ->with('success', 'Card added successfully.');
        } catch (\Exception $e) {

            return back()->withErrors($e->getMessage());
        }
    }
}