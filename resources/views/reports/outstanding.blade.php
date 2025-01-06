@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Outstanding Report</h3>
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
