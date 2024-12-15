@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Add Payment Method') }}</h2>
        </div>
        <form action="{{ route('payment_method.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('payment_method.index') }}" class="btn btn-danger"><i
                                class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="text-center col-4">
                        <img src="{{ asset('default/no_photo.avif') }}" alt="" class="rounded-circle" width="200"
                            height="200" id="photo" style="object-fit: cover; background-position: center;">
                    </div>
                    <div class="col-8">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="type">{{ __('Currency') }} <span class="text-danger">*</span></label>
                            <select name="currency" class="form-control" id="type">
                                <option value="USD">{{ __('USD') }}</option>
                                <option value="KHR">{{ __('KHR') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type">{{ __('Type') }} <span class="text-danger">*</span></label>
                            <select name="is_cash" class="form-control" id="type">
                                <option value="1">{{ __('Cash') }}</option>
                                <option value="0">{{ __('Online Payment') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="photo">{{ __('Photo') }}</label>
                            <input type="file" onchange="handeleFile(event)" class="form-control" name="photo"
                                accept="image/*">
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


@push('js')
    <script>
        function handeleFile(event) {
            const file = event.target.files[0];
            document.getElementById('photo').src = URL.createObjectURL(file);
        }
    </script>
@endpush
