<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;

use App\Models\PageCategory;
use Illuminate\Http\Request;
use App\Repositories\PageRepo;
use App\Repositories\ContentRepo;

class PageCategoryController extends Controller
{
    private $page;
    private $category;
    public function __construct(PageRepo $pageRepos, ContentRepo $contentRepos){
        $this->page=$pageRepos;
        $this->category=$contentRepos;
        $this->middleware('auth');
    }
    public function index()
    {
        
        $pages = $this->page->allpagies();
        $categories = $this->category->allcategories();
         return view('adminpages.pagecategory.index', compact('pages', 'categories'));
    }
   
    public function store(Request $request)
    {
        $pageId = $request->input('page'); 
        $selectedCategories = $request->input('categories', []); 
        foreach ($selectedCategories as $categoryId) {
         
            \App\Models\PageCategory::Create([
                'page_id'=>$pageId,
                'content_id'=>$categoryId
            ]);
        }
        Session::flash('success', "The page has been assigned to the category");
        return redirect()->route('category.index');

    }
    /**
     * Display the specified resource.
     */
    public function show(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PageCategory $pageCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PageCategory $pageCategory)
    {
        //
    }
}
