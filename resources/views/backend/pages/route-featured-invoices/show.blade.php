@extends('backend.layouts.master')

@section('admin-content')
@include('backend.pages.route-featured-invoices.partials.invoice-print', ['invoice' => $invoice])
@endsection
