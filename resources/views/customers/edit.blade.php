@extends('layouts.adminlte.master')
@push('meta')
    <title>{{ __('Customer') }}</title>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Edit Customer') }}</h2>
        </div>
        <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('customer.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="text-center col-4">
                        <img src="{{ asset($customer->photo ? $customer->photo : 'default/no_photo.avif') }}" alt=""
                            class="rounded-circle" width="200" height="200" id="photo"
                            style="object-fit: cover; background-position: center;">
                        <input type="file" onchange="handeleFile(event)" class="mt-5 form-control" name="photo"
                            accept="image/*">
                    </div>
                    <div class="col-8">
                        @csrf
                        <div class="mb-3">
                            <label for="id_card">{{ __('ID Card') }} <span class="text-danger">*</span></label>
                            <input type="text" name="id_card" value="{{ $customer->id_card }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="first_name">{{ __('First Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" value="{{ $customer->first_name }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" value="{{ $customer->last_name }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nick_name">{{ __('Nick Name') }}</label>
                            <input type="text" name="nick_name" value="{{ $customer->nick_name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="age">{{ __('Age') }} <span class="text-danger">*</span></label>
                            <input type="text" name="age" value="{{ $customer->age }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">{{ __('Phone') }} <span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="note">{{ __('Note') }}</label>
                            <input type="text" name="note" value="{{ $customer->note }}" class="form-control">
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


@push('js')
    <script>
        function handeleFile(event) {
            const file = event.target.files[0];
            document.getElementById('photo').src = URL.createObjectURL(file);
        }
    </script>
@endpush
