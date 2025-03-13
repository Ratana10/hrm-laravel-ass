@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Edit Role') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-edit"></i> {{ __('Edit Role') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('roles.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                <div class="my-3 row">
                    <div class="mb-3 col-md-6">
                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
                    </div>
                    
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
