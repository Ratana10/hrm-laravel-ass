@extends('layouts.adminlte.master')

@push('meta')
    <title>{{ __('Add Invoice') }}</title>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-plus"></i> {{ __('Add Invoice') }}</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger"><i class="fa fa-reply"></i> {{ __('Back') }}</a>
            <form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-3 row">
                    <div class="mb-3 col-md-3">
                        <label for="exchange_rate">{{ __('Exchange Rate') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-secondary-subtle" value="{{ $exchangeRate->khr }}"
                            name="exchange_rate_id" readonly>
                    </div>
                    <div class="mb-3 col-md-3">
                        <div class="form-group">
                            <label for="contract_id">{{ __('Contract ID') }} <span class="text-danger">*</span></label>
                            <select name="open_room_id" class="form-select" onchange="getRoomPrice(event)" required>
                                <option value="" price="0" w_amount="0" e_amount="0" w_old_balance="0"
                                    e_old_balance="0">
                                    {{ __('*** Contract ID - Tenant - Room Code') }}
                                </option>
                                @foreach ($openRooms as $open_room)
                                    <option value="{{ $open_room->id }}" price="{{ $open_room->room_price }}"
                                        w_amount="{{ $open_room->water_price_per_meter }}"
                                        e_amount="{{ $open_room->electric_price_per_meter }}"
                                        w_old_balance="{{ $open_room->lastInvoice ? $open_room->lastInvoice->number_w : $open_room->water_meter }}"
                                        e_old_balance="{{ $open_room->lastInvoice ? $open_room->lastInvoice->number_e : $open_room->electric_meter }}">
                                        {{ sprintf('%06d', $open_room->id) . ' - ' . $open_room->customer->first_name . ' ' . $open_room->customer->last_name . ' - ' . $open_room->room->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="date">{{ __('Invoice Date') }} <span class="text-danger">*</span></label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="room_price">{{ __('Room Price') }} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" min="0" step="0.01" value="0" name="room_price"
                                oninput="reCalculateTotalPrice()" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="old_e_balance">{{ __('Old Electric Balance') }}</label>
                        <input type="text" class="form-control" id="old_e_balance" disabled>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="number_e">{{ __('New Electric Balance') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="number_e" required
                            oninput="calculateTotalPrice(event,'e')">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="e_amount_per_kilometer">{{ __('Electric Pricer Per Kilometer') }} <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="e_amount_per_kilometer" required
                                oninput="calculateTotalPrice(event,'e')">
                        </div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="e_amount">{{ __('Total Electric Price') }} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="e_amount" required
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="old_w_balance">{{ __('Old Water Balance') }}</label>
                        <input type="text" class="form-control" id="old_w_balance" disabled>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="number_ew">{{ __('New Water Balance') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="number_w" required
                            oninput="calculateTotalPrice(event,'w')">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="w_amount_per_kilometer">{{ __('Water Pricer Per Kilometer') }} <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" name="w_amount_per_kilometer" required
                                oninput="calculateTotalPrice(event,'w')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="w_amount">{{ __('Total Water Price') }} <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="w_amount" required
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-9"></div>
                    <div class="mb-3 col-md-3 border-top">
                        <label for="total_amount">{{ __('Total Amount') }} (USD) <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control bg-secondary-subtle" name="total_amount" required
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3 col-md-3"></div>
                    <div class="mb-3 col-md-3"></div>
                    <div class="mb-3 col-md-3"></div>
                    <div class="mb-3 col-md-3">
                        <label for="total_amount">{{ __('Total Amount') }} (KHR) <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">៛</span>
                            <input type="text" class="form-control" id="total_khr" disabled>
                        </div>
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

@push('js')
    <script>
        function getRoomPrice(event) {
            const roomPrice = event.target.options[event.target.selectedIndex].getAttribute('price');
            document.querySelector('input[name="room_price"]').value = roomPrice;

            const oldEBalance = event.target.options[event.target.selectedIndex].getAttribute('e_old_balance');
            const oldWBalance = event.target.options[event.target.selectedIndex].getAttribute('w_old_balance');
            document.querySelector('#old_e_balance').value = oldEBalance;
            document.querySelector('#old_w_balance').value = oldWBalance;

            const eAmountPerKilometer = event.target.options[event.target.selectedIndex].getAttribute('e_amount');
            const wAmountPerKilometer = event.target.options[event.target.selectedIndex].getAttribute('w_amount');
            document.querySelector('input[name="e_amount_per_kilometer"]').value = eAmountPerKilometer;
            document.querySelector('input[name="w_amount_per_kilometer"]').value = wAmountPerKilometer;
            reCalculateTotalPrice()
        }

        function calculateTotalPrice(event, type) {
            const eAmountPerKilometer = document.querySelector('input[name="e_amount_per_kilometer"]').value;
            const wAmountPerKilometer = document.querySelector('input[name="w_amount_per_kilometer"]').value;
            const oldEBalance = document.querySelector('#old_e_balance').value;
            const oldWBalance = document.querySelector('#old_w_balance').value;
            const newEBalance = document.querySelector('input[name="number_e"]').value;
            const newWBalance = document.querySelector('input[name="number_w"]').value;
            const roomPrice = document.querySelector('input[name="room_price"]').value;

            let eAmount = 0;
            let wAmount = 0;
            if (type === 'e') {
                eAmount = eAmountPerKilometer * (newEBalance - oldEBalance);
                document.querySelector('input[name="e_amount"]').value = eAmount;
            } else if (type === 'w') {
                wAmount = wAmountPerKilometer * (newWBalance - oldWBalance);
                document.querySelector('input[name="w_amount"]').value = wAmount;
            }

            const totalAmount = +eAmount + +wAmount + +roomPrice;
            document.querySelector('input[name="total_amount"]').value = totalAmount.toLocaleString('USD', {
                style: 'currency',
                currency: 'USD',
            });

            const exchangeRate = document.querySelector('input[name="exchange_rate_id"]').value;
            const totalKhr = totalAmount * exchangeRate;
            document.querySelector('#total_khr').value = (totalKhr).toLocaleString('KHR', {
                style: 'currency',
                currency: 'KHR',
            });
        }

        function reCalculateTotalPrice() {
            calculateTotalPrice(document.querySelector('input[name="number_e"]'), 'e');
        }
    </script>
@endpush
