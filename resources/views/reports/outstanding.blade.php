@extends('layouts.adminlte.master')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Outstanding Report</h2>
                </div>

                <div class="card-body">
                    
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <a href="{{ route('invoice.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
        
                </div>
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
                            <tr>
                                <td>{{ $invoice['room_code'] }}</td>
                                <td>{{ $invoice['customer_name'] }}</td>
                                <td>{{ $invoice['phone'] }}</td>
                                <td>$ {{ number_format($invoice['outstanding_balance'], 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
