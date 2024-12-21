@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Customer') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('customer.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add Customer') }}</a>
                    @include('customers._table')
                </div>
            </div>
        </div>
    </div>
@endsection
