@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header position-relative">
            <h3 class="card-title">Income Report</h3>
            <button type="button" class="position-absolute btn btn-success" style="top: 7px; right:10px;"><i
                    class="fa fa-download"></i>
                {{ __('Export') }}</button>
            <button onclick="window.print()" type="button" class="position-absolute btn btn-dark"
                style="top: 7px; right:105px;"><i class="fa fa-print"></i>
                {{ __('Print') }}</button>
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
