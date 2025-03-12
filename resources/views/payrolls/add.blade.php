@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Payroll') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Payroll') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('payrolls.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('payrolls.store') }}" method="POST">
                @csrf
                <div class="my-3 row">
                    <div class="mb-3 col-md-6">
                        <label for="employee_id">{{ __('Employee') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="employee_id" required>
                            <option value="">{{ __('Select Employee') }}</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="month">{{ __('Month') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="month" placeholder="e.g., March 2025" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="base_salary">{{ __('Base Salary') }} <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="base_salary" required>
                    </div>

                   
                    <div class="mb-3 col-md-6">
                        <label for="deductions">{{ __('Deductions') }} </label>
                        <input type="number" class="form-control" name="deductions" step="0.01">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="bonus">{{ __('Bonus') }} </label>
                        <input type="number" class="form-control" name="bonus" step="0.01">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="tax">{{ __('Tax') }} </label>
                        <input type="number" class="form-control" name="tax" step="0.01">
                    </div>


                    <div class="col-12 text-end">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
