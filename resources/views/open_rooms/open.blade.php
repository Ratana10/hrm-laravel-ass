@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary"><i class="bi bi-door-open"></i> Open Rooms</h2>
                <div class="top-50 input-group position-absolute translate-middle-y" style="width: 200px; right: 1%;">
                    <div class="input-group-text"><i class="fa fa-filter"></i></div>
                    <select name="type" onchange="filterRooms(event)" class="form-select">
                        <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All</option>
                        <option value="busy" {{ $type === 'busy' ? 'selected' : '' }}>Busy</option>
                        <option value="available" {{ $type === 'available' ? 'selected' : '' }}>Available</option>
                    </select>
                </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($rooms as $x => $room)
                    @if ($type === 'busy' && !$room->openRoom)
                        @continue
                    @endif
                    @if ($type === 'available' && $room->openRoom)
                        @continue
                    @endif
                    <div class="pb-3 col-md-3 h-100">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h3 class="card-title text-uppercase">Room Code : <span class="text-primary"
                                        style="font-size: 25px;">{{ $room->code }}</span></h3>
                            </div>
                            <div class="p-0 card-body h-100">
                                <table class="table table-bordered h-100" style="vertical-align: middle">
                                    <tr>
                                        <td>Room Type</td>
                                        <td> {{ $room->roomType->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Room Size</td>
                                        <td> {{ $room->size }}</td>
                                    </tr>
                                    <tr>
                                        <td>Room Price </td>
                                        <td>${{ number_format($room->price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if ($room->openRoom)
                                                <span class="text-danger">Busy</span>
                                            @else
                                                <span class="text-primary">Available</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($room->openRoom)
                                        <tr>
                                            <td>{{ __('Contract ID') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span
                                                        class="badge bg-success">{{ sprintf('%06d', $room->openRoom->id) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Customer</td>
                                            <td>{{ $room->openRoom->customer->first_name }}
                                                {{ $room->openRoom->customer->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $room->openRoom->customer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment / Month </td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span
                                                        class="text-success">${{ number_format($room->openRoom->room_price, 2) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2" rowspan="4" class="pb-3">
                                                <p class="mb-1">{{ __('Note') }}</p>
                                                <textarea readonly rows="4" class="form-control" style="resize: none">
                                                    {{ $room->note }}
                                                </textarea>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <div class="gap-2 text-center card-footer d-flex justify-content-center align-items-center">
                                @if (!$room->openRoom)
                                    <a href="{{ route('open_room.add', $room->id) }}"
                                        class="btn btn-primary w-100">Open</a>
                                @else
                                    <a href="#" class="btn btn-warning"> <i class="fa fa-eye"></i>
                                        {{ __('Invoice') }}</a>
                                    <a href="{{ route('open_room.edit', $room->openRoom->id) }}" class="btn btn-success"><i
                                            class="fa fa-pen"></i> Edit</a>
                                    <button type="button" class="btn btn-lg btn-danger bg-danger popover border-danger"
                                        data-bs-container="body" role="button" data-html="true" data-bs-toggle="popover"
                                        data-bs-placement="left" data-bs-title="{{ __('Are you sure ?') }}"
                                        data-bs-template='
                                            <div class="p-3 bg-white popover" role="tooltip">
                                                <div class="popover-arrow"></div>
                                            <div class="popover-inner"><h4>{{ __('Are you sure ?') }}</h4></div>
                                            <div class="text-center popover-footer">
                                                <a href="#" class="btn btn-secondary" data-bs-dismiss="popover"><i class="fa fa-times"></i> {{ __('No') }}</a>
                                                <a href="{{ route('open_room.delete', $room->openRoom->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Yes') }}</a>
                                            </div>
                                        '>
                                        <i class="fa fa-trash"></i> {{ __('Delete') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function filterRooms(event) {
            const type = event.target.value;
            if (type === 'all') {
                window.location.href = "{{ route('open_room.list_room') }}";
            } else {
                window.location.href = "{{ route('open_room.list_room') }}?type=" + type;
            }
        }
    </script>
@endpush
