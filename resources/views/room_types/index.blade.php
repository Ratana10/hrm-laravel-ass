@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-door-closed"></i> {{ __('Room Type') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('room_type.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add Room Type') }}</a>
                    @include('room_types._table')
                </div>
            </div>
        </div>
    </div>
@endsection
