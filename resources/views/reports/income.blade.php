@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Income Report</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Contract ID</th>
                        <th>Tenant</th>
                        <th>Payment Method</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ date('d-m-Y') }}</td>
                            <td>CON-{{ $i }}</td>
                            <td>Tenant {{ $i }}</td>
                            <td>Bank Transfer</td>
                            <td>${{ number_format(10 * $i, 2) }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
