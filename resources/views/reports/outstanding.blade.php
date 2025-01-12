@extends('layouts.adminlte.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Outstanding Report</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Total Outstanding</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                @if ($invoice->total_amount - $invoice->totalPayment->sum('amount') == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td>{{ $invoice->openRoom->room->code }}</td>
                                    <td>{{ $invoice->openRoom->customer->first_name }}
                                        {{ $invoice->openRoom->customer->last_name }}</td>
                                    <td>{{ $invoice->openRoom->customer->phone }}</td>
                                    <td>$
                                        {{ number_format($invoice->total_amount - $invoice->totalPayment->sum('amount'), 2) }}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
