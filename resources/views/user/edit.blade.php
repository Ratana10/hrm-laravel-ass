@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fa fa-users"></i> {{ __('Edit User') }}</h2>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="text-center col-4">
                        <img src="{{ $user->photo ? asset($user->photo) : asset('default/no_photo.avif') }}" alt=""
                            class="rounded-circle" width="200" height="200" id="photo"
                            style="object-fit: cover; background-position: center;">
                        <input type="file" onchange="handeleFile(event)" class="mt-5 form-control" name="photo"
                            accept="image/*">
                    </div>
                    <div class="col-8">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span> </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label >{{ __('Roles') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="role_id" required>
                                <option value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label >{{ __('Employees') }} <span class="text-danger">*</span></label>
                            <select class="form-control" name="employee_id" required>
                                <option value="{{ $user->employee_id }}">{{ $user->employee->name }}</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input type="text" name="phone" class="form-control"  value="{{ $user->phone }}" >
                        </div>
                        <div class="mb-3">
                            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="text" name="password" class="form-control">
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
