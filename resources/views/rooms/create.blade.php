@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-door-closed"></i> {{ __('Add Room') }}</h2>
        </div>
        <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('room.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="col-12">
                        @csrf
                        <div class="mb-3">
                            <label for="type">{{ __('Type') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="room_type_id" id="type">
                                @foreach ($room_types as $room_type)
                                    <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code">{{ __('Code') }} <span class="text-danger">*</span></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="size">{{ __('Size') }}</label>
                            <input type="text" name="size" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price">{{ __('Price') }} <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="note">{{ __('Note') }}</label>
                            <input type="text" name="note" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            {{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
