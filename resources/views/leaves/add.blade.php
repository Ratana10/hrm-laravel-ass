@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Leave') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Leave') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('leaves.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('leaves.store') }}" method="POST">
                @csrf
                <div class="my-3 row">
                    <div class="mb-3 col-md-6">
                        <label for="employee_id">{{ __('Employee') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="employee_id" required>
                            <option value={{ $employee->id }}>{{ $employee->name ?? 'N/A' }}</option>
                           
                        </select>
                    </div>

                    
                    <div class="mb-3 col-md-6">
                        <label >{{ __('Reason') }} <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" name="reason" required></textarea>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label >{{ __('Start Date') }} <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="check_out">{{ __('End Date') }} <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>


                    <div class="col-12 text-end">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
