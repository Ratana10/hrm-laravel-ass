@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('List Payment') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('invoice.index') }}" class="mb-2 btn btn-danger"><i class="fa fa-reply"></i>
                        {{ __('Back') }}</a>

                    <a href="{{ route('payment_method.add') }}" class="mb-2 btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add Payment') }}</a>
                    @include('payments._table')
                </div>
            </div>
        </div>
    </div>
@endsection
