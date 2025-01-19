@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header position-relative">
            <h3 class="card-title">Outstanding Report</h3>
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
                        <th>Tenant</th>
                        <th>Phone</th>
                        <th>Room Code</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ date('d-m-Y') }}</td>
                            <td>Tenant {{ $i }}</td>
                            <td>08123456789{{ $i }}</td>
                            <td>ROOM-{{ $i }}</td>
                            <td>${{ number_format(1 * $i, 2) }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
