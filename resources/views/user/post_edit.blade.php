@extends('layouts.app')

@section('post_edit')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('post_edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/post_update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_at" value="{{ $post_at }}">
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end image-choice">{{ __('写真選択') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="post_image[]" class="form-control mx-auto" multiple>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post_at" class="col-md-4 col-form-label text-md-end">{{ __('撮影日') }}</label>

                            <div class="col-md-6">
                                <input id="post_at" type="datetime-local" class="form-control @error('post_at') is-invalid @enderror" name="update_post_at" value="{{ old('post_at') }}">

                                @error('post_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 btn-area">
                            <div class="col-md-6 offset-md-4 btn-wrap">
                                <button type="submit" class="btn btn-primary">編集</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection