@extends('layouts.admin_layout')
<style>
#container_content{
   background:white;
   
}
</style>
@section('content')
<div id="container_content">
	<div class="row">
        <div class="col-md-10 offset-md-1"> 
		  <a href="/pages/create">
			<button type="button" class="btn btn-primary m-2" style="width:150px">
				<i class="fa-solid fa-plus"></i>
				Add Page
			</button>
		  </a>

			<div class="mt-2 col-sm-12 col-md-12">
				
            
					
					<!-- adminpages.blog.index.blade.php -->

                @if(isset($content) && is_countable($content) && count($content) > 0) 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Meta Data</th>
                                <th colspan="3">Action</th>
                               
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                
                @foreach ($content as $key=> $item)
                <tr>
                   <td>{{$content->firstItem() + $key }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>
                    @if(isset($item->page_metadata) && is_countable($item->page_metadata) && count($item->page_metadata) > 0) 
                        
                     @foreach ($item->page_metadata as $key2=> $item2)
                    
                          {{$item2->metadata->meta_name}}, 
                            <!--{{$item2->meta_description}};-->
                            @if(($key2 + 1) % 2 === 0)
                                <br>
                            @endif
                     @endforeach
                        </ul>
                    @endif
                    </td>
                    <td><a href="{{ route('pages.show', $item->id) }}" class="btn btn-warning">View</a></td>
                    <td>
                        <form action="{{ route('pages.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
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
@endsection
