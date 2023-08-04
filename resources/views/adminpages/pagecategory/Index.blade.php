@extends('layouts.admin_layout')
<style>
#container_content{
   background:white;
   
}
</style>
@section('content')
<div id="container_content">
    <div class="row">
        <div class="col-md-10 offset-md-1 pt-3"> 
            <form action="/page_category" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8 mt-3"> 
                        <h6>Select Page</h6>  
                        @if (isset($pages) && !empty($pages))
                            <select name="page" class="form-control" >
                                @foreach ($pages as $page)
                                    <option value="{{ $page['id'] }}">{{ $page['title'] }}</option>
                                @endforeach
                            </select>
                        @else
                            <p>No pages available.</p>
                        @endif
                    </div>
                    <div class="col-md-8 mt-3"> 
                        <h6 style="color:orange">Tick Categories to Assign the page to</h6>  
                        <!-- Checkboxes for Categories -->
                        @if (isset($categories) && !empty($categories))
                            @foreach ($categories as $category)
                                <input type="checkbox" class="form-control" name="categories[]" value="{{ $category['id'] }}" id="{{ $category['name'] }}">
                                <label for="{{ $category['name'] }}">{{ $category['name'] }}</label><br>
                            @endforeach
                        @else
                            <p>No categories available.</p>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
