@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-receipt"></i>{{ __('Attendances') }}</h2>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                @if(!(Auth::check() && strtolower(Auth::user()->role->name) === 'admin'))
                <a href="{{ route('attendances.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                {{ __('Add') }}</a>
                @endif
                    
                </div>
                <div class="col"></div>
                <div class="col-3">

                </div>
            </div>
            @include('attendances._table')
        </div>
    </div>
@endsection

