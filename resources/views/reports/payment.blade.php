@extends('layouts.adminlte.master')
@section('content')
<div class="card">
    <div class="card-header position-relative">
        <h3 class="card-title">Payment Report</h3>
        <button type="button" class="position-absolute btn btn-success" style="top: 7px; right:10px;"><i
                class="fa fa-download"></i>
            {{ __('Export') }}</button>
        <a href="{{ route('payments.pdf') }}" target="_blank" class="position-absolute btn btn-dark"
            style="top: 7px; right:105px;"><i class="fa fa-print"></i>
            {{ __('Print') }}</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Date</th>
                    <th>Invoice</th>
                    <th>Tenant</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ sprintf('%06d', $payment->invoice_id) }}</td>
                        <td>{{ $payment->invoice->openRoom->customer->first_name }}
                            {{ $payment->invoice->openRoom->customer->last_name }}</td>
                        <td>{{ $payment->paymentMethod->name }}</td>
                        <td>$ {{ number_format($payment->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
