@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Attendance') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Attendance') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('attendances.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf
                <div class="my-3 row">
                <div class="mb-3 col-md-6">
                        <label for="employee_id">{{ __('Employee') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="employee_id" required>
                            <option value={{ $employee->id }}>{{ $employee->name ?? 'N/A' }}</option>
                           
                        </select>
                    </div>


                    <div class="mb-3 col-md-6">
                        <label for="check_in">{{ __('Check In') }} <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" name="check_in" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="check_out">{{ __('Check Out') }} <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" name="check_out" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="status" required>
                            <option value="present">{{ __('Present') }}</option>
                            <option value="absent">{{ __('Absent') }}</option>
                            <option value="leave">{{ __('Leave') }}</option>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
