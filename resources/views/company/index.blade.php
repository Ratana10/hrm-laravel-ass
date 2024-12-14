@extends('layouts.adminlte.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary">
                <i class="far fa-building"></i> {{ __('Company') }}
                <a href="{{ route('company.edit') }}" class="mt-1 float-end btn btn-sm btn-success">
                    <i class="fa fa-pen"></i> {{ __('Edit') }}
                </a>
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="m-auto text-center col-4">
                    <img src="{{ asset($company->photo) }}" alt="" class="rounded-circle" width="200"
                        height="200" style="object-fit: cover; background-position: center;">
                </div>
                <div class="col-8">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{ __('Name') }}</td>
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}</td>
                                <td>{{ $company->phone }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}</td>
                                <td>{{ $company->address }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Facebook') }}</td>
                                <td>{{ $company->facebook }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Telegram') }}</td>
                                <td>{{ $company->telegram }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Tiktok') }}</td>
                                <td>{{ $company->tiktok }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
