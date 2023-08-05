@extends('layouts.admin_layout')
<style>
    #container_content {
        background: white;
    }
</style>
@section('content')
<div id="container_content">
    <div class="row">
       
        
        @if(isset($content)) 
        <div class="col-md-8 offset-md-2">
           
            <h5>Assigned Pages With Their Categories  </h5>
            <!-- Assuming you have a valid HTML structure -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S/n</th>
                        <th>Page Category</th>
                        <th>Page Titles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $key=> $parent)
                        <tr>
                        <td>{{$content->firstItem() + $key }}</td>
                            <td>{{ $parent['name'] }}</td>
                            <td>
                            <table class="table table-striped">
                                    @foreach ($parent['page_category'] as $pageCategory)
                                    <tr>
                                        <td class="d-flex"><h6 class="m-4">{{ $pageCategory['page']['title'] }} </h6>
                                    
                                        <form action="{{ route('page_category.destroy',  $pageCategory['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                        {{ $content->links() }}
            </div>
            
        </div>   
        @else
        <div class="alert alert-danger mt-3">Page not found.</div>
         @endif
        </div>
    </div>
</div>
@endsection
