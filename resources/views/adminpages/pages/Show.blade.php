@extends('layouts.admin_layout')
<style>
    #container_content {
        background: white;
    }
</style>
@section('content')
<div id="container_content">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-2">
            @if(isset($content))   
                <div class="row mt-4">
                    <div class="col-md-8 mt-3">
                    <h5> Page Title  </h5>
                    {{$content->title}}</div>
                    <div class="col-md-8 mt-3">
                    <h5> Page Content</h5>
                    {{$content->content}} </div>
                    <div class="col-md-8 mt-3 p-2">
                        <img src="{{ asset('storage/files/' . $content->post_image) }}" alt="Post Image" width="400px">
                    </div>

                    <div class="col-md-8 mt-3">
                       <a href="{{ route('pages.edit', $content->id) }}" class="btn btn-primary">Edit Page Content</a>
                     </div>
                    <div class="col-md-8"> 
                            
                    @if(isset($content->page_metadata)) 
                        <h5> Page Meta Data</h5>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($content->page_metadata as $key2=> $content2)
                             <tr>
                                <td>{{$key2 + 1}}</td>
                                <td> {{$content2->metadata->meta_name}}</td> 
                               <td>{{$content2->meta_description}}</td>
                               <td><a href="#" class="btn btn-danger">Delete</a> </td>
                              
                            </tr>
                            <tr>
                                <td><a href="#" class="btn btn-primary"> Add Meta Data</a></td>

                            </tr>
                        @endforeach
                           
                       @endif
                    </div>


                </div>
                
            @else
                <div class="alert alert-danger mt-3">Show Page.</div>
            @endif
        </div>
    </div>
</div>
@endsection
