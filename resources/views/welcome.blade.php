@extends('layouts.adminlte.master')
@push('meta')
    <title>{{ __('Dashboard') }}</title>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="text-white fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Employee</span>
                        <span class="info-box-number">{{ $totalEmployees }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="text-white fa fa-home"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Leave request Pending</span>
                        <span class="info-box-number">{{ $totalLeaveRequestsPending }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="text-white bi bi-door-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Attendance Today</span>
                        <span class="info-box-number">{{ $totalAttendanceToday }}</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

