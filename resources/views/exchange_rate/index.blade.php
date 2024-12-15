@extends('layouts.adminlte.master')

@section('content')
    @include('exchange_rate.create')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Exchange Rate') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_exchange_rate">
                        <i class="fa fa-plus"></i> {{ __('Add Exchange Rate') }}
                    </button>
                    <table class="table text-center table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('USD') }}</th>
                                <th>{{ __('KHR') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($exchange_rate)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $exchange_rate->usd }} USD</td>
                                    <td>{{ $exchange_rate->khr }} KHR</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3">{{ __('No Data') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
