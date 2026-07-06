@extends('backend.layouts.master')

@section('admin-content')
@include('backend.pages.city-featured-invoices.partials.invoice-print', ['invoice' => $invoice, 'isAdmin' => true])
@endsection
