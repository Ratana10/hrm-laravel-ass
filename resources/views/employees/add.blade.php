@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Employee') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Employee') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('employees.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-3 row">
                    <div class="mb-3 col-md-6">
                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                   
                    <div class="mb-3 col-md-6">
                        <label for="department_id">{{ __('Department') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="department" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="position">{{ __('Position') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="position" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="salary">{{ __('Salary') }} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" min="0" step="0.01" class="form-control" name="salary" required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email">{{ __('Work Date') }} <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="work_date" required>
                    </div>
                
                    <div class="col-12 text-end">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
