@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Open Room') }} - {{ $room->code }}</h2>
        </div>
        <form action="{{ route('open_room.store', $room->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('open_room.list_room') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    @csrf
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="customer">{{ __('Tenant') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select name="customer_id" id="customer" class="form-control" required>
                                    <option value="">{{ __('Please Select') }}</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->first_name }}
                                            {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('customer.add') }}" class="input-group-text btn btn-primary">
                                    <i class="fa fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="start_date">{{ __('Start Date') }} <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="end_date">{{ __('End Date') }} <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="booking_amount">{{ __('Deposit Amount') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" min="0" value="0" step="0.01" name="booking_amount"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="condition_invoice">{{ __('Payment on day X every month') }} <span
                                    class="text-danger">*</span></label>
                            <input type="number" min="1" max="31" value="30" name="condition_invoice"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="alert">{{ __('Number of day to alert before payment') }} <span
                                    class="text-danger">*</span></label>
                            <input type="number" min="1" max="31" value="1" name="alert"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="room_price">{{ __('Room Price') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" min="1" step="0.01" value="{{ $room->price }}"
                                    name="room_price" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="room_type">{{ __('Room Type') }}</label>
                            <input type="text" value="{{ $room->roomType->name }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="room_size">{{ __('Room Size') }}</label>
                            <input type="text" value="{{ $room->size }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="water_metter">{{ __('Old Water Supply') }} <span class="text-danger">*
                                    (Kilometer)</span></label>
                            <div class="input-group">
                                <input type="number" min="0.01" name="water_meter" step="0.01"
                                    class="form-control" required>
                                <span class="input-group-text">Kilometer</span>
                                <span class="input-group-text">$</span>
                                <input type="number" min="0.01" value="0.25" step="0.01"
                                    name="water_meter_price" class="form-control" required>
                                <span class="input-group-text">/ Kilometer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="electric_metter">{{ __('Old Electricity Supply') }} <span class="text-danger">*
                                    (Kilometer)</span></label>
                            <div class="input-group">
                                <input type="number" min="0.01" name="electric_meter" step="0.01"
                                    class="form-control" required>
                                <span class="input-group-text">Kilometer</span>
                                <span class="input-group-text">$</span>
                                <input type="number" min="0.01" value="0.25" step="0.01"
                                    name="electric_meter_price" class="form-control" required>
                                <span class="input-group-text">/ Kilometer</span>
                            </div>
                        </div>
                    </div>
                    {{-- fix data --}}
                    <h2 class="px-3 mt-2 text-success"><i class="fa fa-users"></i> {{ __('Room Member') }} <button
                            class="btn btn-info"><i class="fa fa-plus-circle"></i> {{ __('Add') }}</button></h2>
                    <table class="table text-center table-sm table-borderd" style="vertical-align: middle">
                        <thead>
                            <tr>
                                <th>{{ __('Action') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Note') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-danger"><i class="fa fa-trash btn btn-danger"></i></td>
                                <td><input type="text" class="form-control"></td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger"><i class="fa fa-trash btn btn-danger"></i></td>
                                <td><input type="text" class="form-control"></td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-danger"><i class="fa fa-trash btn btn-danger"></i></td>
                                <td><input type="text" class="form-control"></td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="note">{{ __('Note') }}</label>
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            {{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    </div>
@endsection


@push('js')
    <script>
        function handeleFile(event) {
            const file = event.target.files[0];
            document.getElementById('photo').src = URL.createObjectURL(file);
        }
    </script>
@endpush
