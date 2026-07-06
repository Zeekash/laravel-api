@extends('company.layouts.master')

@section('content')
@include('backend.pages.city-featured-invoices.partials.invoice-print', ['invoice' => $invoice, 'isAdmin' => false])
@endsection
