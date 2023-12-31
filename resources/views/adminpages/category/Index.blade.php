@extends('layouts.admin_layout')
<style>
#container_content {
    background: white;
}

/* Add custom style for pagination */

</style>
@section('content')
<div id="container_content">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <a href="{{ url('/category/create') }}">
                <button type="button" class="btn btn-primary m-2" style="width: 150px">
                    <i class="fa-solid fa-plus"></i>
                    Add Category
                </button>
            </a>

            <div class="mt-2 col-sm-12 col-md-12">
                @if(isset($content) && is_countable($content) && count($content) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th colspan="3">Action</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($content as $key=>$item)
                                <tr>
                                    <td>{{$content->firstItem() + $key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                    </td>
                                  
                                    <!-- Add more table cells as needed -->
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!-- Add bootstrap pagination links -->
                    <div class="d-flex justify-content-center">
                        {{ $content->links() }}
                    </div>
                @else
                    <div class="alert alert-info">No content found.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
