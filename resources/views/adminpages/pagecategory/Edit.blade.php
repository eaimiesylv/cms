@extends('layouts.admin_layout')
<style>
    #container_content {
        background: white;
    }
</style>
@section('content')
<div id="container_content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        
        @if(isset($content)) 
          
            <form method="POST" class="" action="{{ route('pages.update', ['page' => $content->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <label for="page" class="col-md-12 col-form-label text-md-start">{{ __('Page Title') }}</label>

                    <div class="col-md-10">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $content->title }}" required autocomplete="name" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="old_file" value="{{ $content->post_image }}">
                <div class="row">
                    <label for="file" class="col-md-12 col-form-label text-md-start">{{ __('Upload File') }}</label>

                    <div class="col-md-10">
                        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file">

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <label for="page" class="col-md-12 col-form-label text-md-start">{{ __('Enter page name') }}</label>

                    <div class="col-md-10">
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="name" autofocus>{{ $content->content }}</textarea>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
            @else
                <div class="alert alert-danger mt-3">Page not found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
