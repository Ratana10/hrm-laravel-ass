@extends('layouts.adminlte.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-receipt"></i>{{ __('Invoice') }}</h2>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('invoice.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        {{ __('Add') }}</a>
                </div>
                <div class="col"></div>
                <div class="col-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-users"></i> {{ __('Tenants') }} </span>
                        <select name="customer_id" class="form-select" onchange="filterInvoices(event)">
                            <option value="all">All</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $customer_id == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->first_name }}
                                    {{ $customer->last_name }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            @include('invoices._table')
        </div>
    </div>
@endsection

@push('js')
    <script>
        function filterInvoices(event) {
            const customer_id = event.target.value;
            if (customer_id === 'all') {
                window.location.href = "{{ route('invoice.index') }}";
            } else {
                window.location.href = "{{ route('invoice.index') }}?customer_id=" + customer_id;
            }
        }
    </script>
@endpush
