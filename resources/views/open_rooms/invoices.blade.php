@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Invoices for Contract ID: {{ sprintf('%06d', $openRoomId) }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Room Price') }}</th>
                        <th>{{ __('Electric Amount') }}</th>
                        <th>{{ __('Water Amount') }}</th>
                        <th>{{ __('Total Amount') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $index => $invoice)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $invoice->date }}</td>
                            <td>${{ number_format($invoice->room_price, 2) }}</td>
                            <td>${{ number_format($invoice->e_amount, 2) }}</td>
                            <td>${{ number_format($invoice->w_amount, 2) }}</td>
                            <td>${{ number_format($invoice->total_amount, 2) }}</td>
                            <td>
                                <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('invoice.delete', $invoice->id) }}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">{{ __('No invoices found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
