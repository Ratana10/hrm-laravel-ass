@extends('layouts.adminlte.master')
@push('meta')
    <title>{{ __('Edit Comment') }}</title>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fas fa-comment-alt"></i> {{ __('Edit Comment') }}</h2>
        </div>
        <form action="{{ route('customer_comment.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('customer_comment.index', $comment->customer->id) }}" class="btn btn-danger"><i
                                class="fa fa-arrow-left"></i>
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="my-5 row">
                    <div class="col-12">
                        @csrf
                        <div class="mb-3">
                            <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                            <input type="date" name="date" value="{{ $comment->date }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ $comment->title }}" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="note">{{ __('Note') }}</label>
                            <input type="text" name="note" value="{{ $comment->note }}" class="form-control">
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
