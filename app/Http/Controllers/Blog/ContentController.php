<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\ContentFormRequest;
use App\Repositories\ContentRepo;
use App\Trait\HandleException;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    use HandleException;
    private $content;
    public function __construct(ContentRepo $contentRepos){
        $this->content=$contentRepos;
    }
    public function index()
    {
      
        return view('adminpages.category.index', array('content' =>$this->content->all()));
    }
    public function create()
    {
        return view('adminpages.category.create');
    }
    public function store(ContentFormRequest $request)
    { 
        $this->tryCatch(function () use ($request) {
            Content::create($request->all());
        }, 'Category has been created successfully');

        return redirect()->route('category.index');

    }
    public function show(Content $content)
    {
        //
    }
    public function edit(Content $category)
    {
        
        return view('adminpages.category.edit', compact('category'));
       
    }
    public function update(ContentFormRequest $request, Content $category)
    {
        $this->tryCatch(function () use ($request, $category) {
            $category->update($request->all());
        }, 'Category has been updated successfully');

        return redirect()->route('category.index');
       
    
       
    }
    
    public function destroy(Content $category)
    {
      $category->delete();
      Session::flash('success', "Category has been deleted successfully");
      return redirect()->route('category.index');

    }
}
