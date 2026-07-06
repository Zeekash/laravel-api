@extends('company.layouts.master')

@section('content')
@include('backend.pages.route-featured-invoices.partials.invoice-print', ['invoice' => $invoice])
@endsection
