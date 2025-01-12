@extends('layouts.adminlte.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Payment Report</h2>
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
        </div>
    </div>
@endsection
