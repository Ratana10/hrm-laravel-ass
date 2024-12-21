@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-door-closed"></i> {{ __('Room') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('room.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add Room') }}</a>
                    @include('rooms._table')
                </div>
            </div>
        </div>
    </div>
@endsection
