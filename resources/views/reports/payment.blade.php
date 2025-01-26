@extends('layouts.adminlte.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Payment Report</h3>
            <div class="d-flex align-items-center gap-2">
                <!-- Date Filter Form -->
                <form method="GET" action="{{ route('report.payment') }}" class="d-flex align-items-center">
                    <input type="date" name="start_date" value="{{ $start_date }}" class="form-control form-control-sm me-2" required>
                    <input type="date" name="end_date" value="{{ $end_date }}" class="form-control form-control-sm me-2" required>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-filter"></i> 
                    </button>
                </form>

                 <!-- Clear Filter Button -->
                <a href="{{ route('report.payment') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-times-circle"></i> {{ __('Clear Filter') }}
                </a>

                <!-- Export and Print Buttons -->
                <a href="{{ route('payments.pdf') }}" target="_blank" class="btn btn-dark btn-sm">
                    <i class="fa fa-print"></i> {{ __('Print') }}
                </a>
                <a href="{{ route('payments.excel') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-download"></i> {{ __('Export') }}
                </a>
            </div>
        </div>
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
