@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Add Payment') }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('payment.store', $invoice_id) }}" method="POST">
                        @csrf
                        <div class="my-5 row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="payment_method_id">{{ __('Payment Method') }} <span
                                            class="text-danger">*</span></label>
                                    <select name="payment_method_id" class="form-control" required>
                                        @foreach ($payment_methods as $payment_method)
                                            <option value="{{ $payment_method->id }}">{{ $payment_method->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="amount">{{ __('Amount') }} ($) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" min="0.01" name="amount" class="form-control"
                                        required>
                                    <input type="hidden" name="exchange_rate_id" value="{{ $exchange_rate->id }}">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
