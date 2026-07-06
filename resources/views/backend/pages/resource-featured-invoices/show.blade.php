@extends('backend.layouts.master')

@section('admin-content')
@include('backend.pages.resource-featured-invoices.partials.invoice-print', ['invoice' => $invoice, 'isAdmin' => true])
@endsection
