@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h2 class="mb-0 text-primary"><i class="bi bi-receipt"></i>Invoice #{{ sprintf('%06d', $invoice->id) }}</h2>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('invoice.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
                <a href="{{ route('payment.add', $invoice->id) }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Payment
                </a>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->paymentMethod->name }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No payments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
