@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Role') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Role') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('roles.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="my-3 row">

                    <div class="mb-3 col-md-6">
                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name"  required>
                    </div>


                    <div class="col-12 text-end">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
