@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-receipt"></i>{{ __('Payrolls') }}</h2>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('payrolls.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add') }}</a>
                </div>
                <div class="col"></div>
                <div class="col-3">

                </div>
            </div>
            @include('payrolls._table')
        </div>
    </div>
@endsection

