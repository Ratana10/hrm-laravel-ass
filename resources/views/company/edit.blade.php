@extends('layouts.adminlte.master')
@section('content')
    <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0 text-primary">
                    <i class="far fa-building"></i> {{ __('Company') }}
                    <button type="submit" class="mt-1 float-end btn btn-sm btn-success">
                        <i class="fa fa-pen"></i> {{ __('Update') }}
                    </button>
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="m-auto text-center col-4">
                        <img src="{{ asset($company->photo) }}" alt="" class="rounded-circle" width="200"
                            height="200" id="photo" style="object-fit: cover; background-position: center;">
                        <input type="file" onchange="handeleFile(event)" class="mt-5 form-control" name="photo"
                            accept="image/*">
                    </div>
                    <div class="col-8">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>{{ __('Name') }}</td>
                                    <td>
                                        <input type="text" name="name" value="{{ $company->name }}"
                                            class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('Phone') }}</td>
                                    <td>
                                        <input type="text" name="phone" value="{{ $company->phone }}"
                                            class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('Address') }}</td>
                                    <td>
                                        <input type="text" name="address" value="{{ $company->address }}"
                                            class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('Facebook') }}</td>
                                    <td>
                                        <input type="text" name="facebook" value="{{ $company->facebook }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('Telegram') }}</td>
                                    <td><input type="text" name="telegram" value="{{ $company->telegram }}"
                                            class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>{{ __('Tiktok') }}</td>
                                    <td><input type="text" name="tiktok" value="{{ $company->tiktok }}"
                                            class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('js')
    <script>
        function handeleFile(event) {
            const file = event.target.files[0];
            document.getElementById('photo').src = URL.createObjectURL(file);
        }
    </script>
@endpush
