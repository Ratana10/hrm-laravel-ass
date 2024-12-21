@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="bi bi-door-closed"></i> {{ __('Edit Room Type') }}</h2>
        </div>
        <form action="{{ route('room_type.update', $room_type->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('room_type.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="col-12">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span> </label>
                            <input type="text" name="name" value="{{ $room_type->name }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="note">{{ __('Note') }}</label>
                            <input type="text" name="note" value="{{ $room_type->note }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                            {{ __('Update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
