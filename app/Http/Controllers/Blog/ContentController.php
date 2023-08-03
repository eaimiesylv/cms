<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Requests\ContentFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content=Content::all();
        return view('adminpages.category.index', array('content'=>$content));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentFormRequest $request)
    { 
        try{
            Content::Create($request->all());
            Session::flash('message', "Category has been created successfully");
            return redirect()->route('category.index');
        }
        catch(QueryException $e){
            Session::flash('error', "Try again");
            return redirect()->route('category.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $category)
    {
        
        return view('adminpages.category.edit', compact('category'));
       
    }

    /**
     * Update the specified resource in storage.
     */
   
    
    public function update(ContentFormRequest $request, Content $category)
    {
        
        try{
            $category->update($request->all());
            Session::flash('message', "Category has been updated successfully");
            return redirect()->route('category.index');
        }
        catch(QueryException $e){
            Session::flash('error', "Try again");
            return redirect()->route('category.index');
        }
    
       
    }
    
    public function destroy(Content $category)
    {
      $category->delete();
      Session::flash('message', "Category has been deleted successfully");
      return redirect()->route('category.index');

    }
}
