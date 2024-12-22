@extends('layouts.adminlte.master')
@push('meta')
    <title>{{ __('Comment') }}</title>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fas fa-comment-alt"></i> {{ __('Comment') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('customer.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i>
                        {{ __('Back') }}</a>
                    <a href="{{ route('customer_comment.add', $customer_id) }}" class="btn btn-primary"><i
                            class="fa fa-plus"></i>
                        {{ __('Add Comment') }}</a>
                    @include('customers.comments._table')
                </div>
            </div>
        </div>
    </div>
@endsection
