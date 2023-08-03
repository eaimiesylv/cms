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
        @if($category->count() > 0)
        
            <form method="POST" class="" action="{{ route('category.update', ['category' => $category->id]) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <label for="category" class="col-md-12 col-form-label text-md-start">{{ __('Enter category name') }}</label>

                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                        @error('name')
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
                <div class="alert alert-danger">Category->id not found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
