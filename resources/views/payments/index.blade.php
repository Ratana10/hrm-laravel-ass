@extends('layouts.adminlte.master')
@section('content')
    <div class="bg-transparent border-0 shadow-print-none card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('List Payment') }}</h2>
        </div>
        <div class="border-0 card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('invoice.index') }}" class="mb-2 btn btn-danger d-print-none"><i class="fa fa-reply"></i>
                        {{ __('Back') }}</a>
                    <a href="{{ route('payment.add', $invoice_id) }}" class="mb-2 btn btn-primary d-print-none"><i
                            class="fa fa-plus"></i>
                        {{ __('Add Payment') }}</a>
                    <a href="javascript:window.print()" class="mb-2 btn btn-info d-print-none"><i class="fa fa-print"></i>
                        {{ __('Print') }}</a>
                    <div class="row d-none d-print-block">
                        <div class="col-12">
                            {{ __('Contract ID ') }} : {{ sprintf('%06d', $invoice->openRoom->id) }}
                        </div>
                        <div class="col-12">
                            {{ __('Customer Name ') }} : {{ $invoice->openRoom->customer->first_name }}
                            {{ $invoice->openRoom->customer->last_name }}
                        </div>
                        <div class="col-12">
                            {{ __('Phone') }} : {{ $invoice->openRoom->customer->phone }}
                        </div>
                        <div class="col-12">
                            {{ __('Total Amount') }} : ${{ number_format($invoice->total_amount, 2) }}
                        </div>
                        <div class="col-12">
                            {{ __('Total Payment') }} : ${{ number_format($invoice->totalPayment->sum('amount'), 2) }}
                        </div>
                        <div
                            class="col-12 {{ $invoice->total_amount - $invoice->totalPayment->sum('amount') > 0 ? 'text-danger' : '' }}">
                            {{ __('Balance') }} :
                            ${{ number_format($invoice->total_amount - $invoice->totalPayment->sum('amount'), 2) }}
                        </div>
                    </div>
                    @include('payments._table')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        @media print {
            @page {
                margin: 0;
                size: A4;
                padding: 0;
            }

            .shadow-print-none {
                box-shadow: none !important;
            }
        }
    </style>
@endpush
