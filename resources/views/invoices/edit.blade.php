@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Edit Invoice') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-edit"></i> {{ __('Edit Invoice') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="my-3 row">
                    <!-- Exchange Rate -->
                    <div class="mb-3 col-md-3">
                        <label for="exchange_rate">{{ __('Exchange Rate') }}</label>
                        <input type="text" class="form-control bg-secondary-subtle"
                            value="{{ $invoice->exchangeRate->khr }}" name="exchange_rate_id" readonly>
                    </div>

                    <!-- Contract ID -->
                    <div class="mb-3 col-md-3">
                        <label for="contract_id">{{ __('Contract ID') }}</label>
                        <select name="open_room_id" class="form-select" onchange="getRoomPrice(event)" required>
                            @foreach ($openRooms as $open_room)
                                <option value="{{ $open_room->id }}" 
                                    price="{{ $open_room->room_price }}"
                                    w_amount="{{ $open_room->water_price_per_meter }}"
                                    e_amount="{{ $open_room->electric_price_per_meter }}"
                                    w_old_balance="{{ $open_room->lastInvoice ? $open_room->lastInvoice->number_w : $open_room->water_meter }}"
                                    e_old_balance="{{ $open_room->lastInvoice ? $open_room->lastInvoice->number_e : $open_room->electric_meter }}"
                                    {{ $open_room->id == $invoice->open_room_id ? 'selected' : '' }}>
                                    {{ sprintf('%06d', $open_room->id) . ' - ' . $open_room->customer->first_name . ' ' . $open_room->customer->last_name . ' - ' . $open_room->room->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Invoice Date -->
                    <div class="mb-3 col-md-3">
                        <label for="date">{{ __('Invoice Date') }}</label>
                        <input type="date" name="date" value="{{ $invoice->date }}" class="form-control" required>
                    </div>

                    <!-- Room Price -->
                    <div class="mb-3 col-md-3">
                        <label for="room_price">{{ __('Room Price') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" min="0" step="0.01" value="{{ $invoice->room_price }}" name="room_price"
                                oninput="reCalculateTotalPrice()" class="form-control" required>
                        </div>
                    </div>

                    <!-- Old Electric Balance -->
                    <div class="mb-3 col-md-3">
                        <label for="old_e_balance">{{ __('Old Electric Balance') }}</label>
                        <input type="text" class="form-control bg-secondary-subtle" id="old_e_balance"
                            value="{{ $invoice->number_e }}" disabled>
                    </div>

                    <!-- New Electric Balance -->
                    <div class="mb-3 col-md-3">
                        <label for="number_e">{{ __('New Electric Balance') }}</label>
                        <input type="text" class="form-control" name="number_e" value="{{ $invoice->number_e }}"
                            oninput="calculateTotalPrice(event, 'e')" required>
                    </div>

                    <!-- Electric Price Per Kilometer -->
                    <div class="mb-3 col-md-3">
                        <label for="e_amount_per_kilometer">{{ __('Electric Price Per Kilometer') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="e_amount_per_kilometer"
                                value="{{ $invoice->e_amount_per_kilometer }}" oninput="calculateTotalPrice(event, 'e')" required>
                        </div>
                    </div>

                    <!-- Total Electric Price -->
                    <div class="mb-3 col-md-3">
                        <label for="e_amount">{{ __('Total Electric Price') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="e_amount"
                                value="{{ $invoice->e_amount }}" readonly required>
                        </div>
                    </div>

                    <!-- Old Water Balance -->
                    <div class="mb-3 col-md-3">
                        <label for="old_w_balance">{{ __('Old Water Balance') }}</label>
                        <input type="text" class="form-control bg-secondary-subtle" id="old_w_balance"
                            value="{{ $invoice->number_w }}" disabled>
                    </div>

                    <!-- New Water Balance -->
                    <div class="mb-3 col-md-3">
                        <label for="number_w">{{ __('New Water Balance') }}</label>
                        <input type="text" class="form-control" name="number_w" value="{{ $invoice->number_w }}"
                            oninput="calculateTotalPrice(event, 'w')" required>
                    </div>

                    <!-- Water Price Per Kilometer -->
                    <div class="mb-3 col-md-3">
                        <label for="w_amount_per_kilometer">{{ __('Water Price Per Kilometer') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="w_amount_per_kilometer"
                                value="{{ $invoice->w_amount_per_kilometer }}" oninput="calculateTotalPrice(event, 'w')" required>
                        </div>
                    </div>

                    <!-- Total Water Price -->
                    <div class="mb-3 col-md-3">
                        <label for="w_amount">{{ __('Total Water Price') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="w_amount"
                                value="{{ $invoice->w_amount }}" readonly required>
                        </div>
                    </div>

                    <div class="col-md-9"></div>
                    <div class="mb-3 col-md-3 border-top">
                        <label for="total_amount">{{ __('Total Amount') }} (USD)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="total_amount"
                                value="{{ $invoice->total_amount }}" readonly required>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> {{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function calculateTotalPrice(event, type) {
    const eAmountPerKilometer = parseFloat(document.querySelector('input[name="e_amount_per_kilometer"]').value) || 0;
    const wAmountPerKilometer = parseFloat(document.querySelector('input[name="w_amount_per_kilometer"]').value) || 0;
    const oldEBalance = parseFloat(document.querySelector('#old_e_balance').value) || 0;
    const oldWBalance = parseFloat(document.querySelector('#old_w_balance').value) || 0;
    const newEBalance = parseFloat(document.querySelector('input[name="number_e"]').value) || 0;
    const newWBalance = parseFloat(document.querySelector('input[name="number_w"]').value) || 0;
    const roomPrice = parseFloat(document.querySelector('input[name="room_price"]').value) || 0;

    let eAmount = 0;
    let wAmount = 0;

    if (type === 'e' || type === 'all') {
        const totalElectric = Math.max(0, newEBalance - oldEBalance); // Ensure no negative value
        eAmount = totalElectric * eAmountPerKilometer;
        document.querySelector('input[name="e_amount"]').value = eAmount.toFixed(2);
    }

    if (type === 'w' || type === 'all') {
        const totalWater = Math.max(0, newWBalance - oldWBalance); // Ensure no negative value
        wAmount = totalWater * wAmountPerKilometer;
        document.querySelector('input[name="w_amount"]').value = wAmount.toFixed(2);
    }

    // Calculate total amount (USD)
    const totalAmount = roomPrice + eAmount + wAmount;
    document.querySelector('input[name="total_amount"]').value = totalAmount.toFixed(2);

    // Calculate total amount (KHR)
    const exchangeRate = parseFloat(document.querySelector('input[name="exchange_rate_id"]').value) || 1;
    const totalKhr = totalAmount * exchangeRate;
    document.querySelector('#total_khr').value = totalKhr.toLocaleString('en-US', {
        style: 'currency',
        currency: 'KHR',
    });
}

function reCalculateTotalPrice() {
    calculateTotalPrice(null, 'all');
}
    </script>
@endpush
