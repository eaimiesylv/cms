<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;

use App\Models\PageCategory;
use Illuminate\Http\Request;
use App\Repositories\PageRepo;
use App\Repositories\ContentRepo;
use Illuminate\Support\Facades\Session;
class PageCategoryController extends Controller
{
    private $page;
    private $category;
    public function __construct(PageRepo $pageRepos, ContentRepo $contentRepos){
        $this->page=$pageRepos;
        $this->category=$contentRepos;
       // $this->middleware('auth');
    }
    public function index()
    {
       //return all pages and their category 
        $pages = $this->page->allpagies();
        $categories = $this->category->allcategories();
         return view('adminpages.pagecategory.index', compact('pages', 'categories'));
    }
   
    public function store(Request $request)
    {
        $pageId = $request->input('page'); 
        $selectedCategories = $request->input('categories', []); 
        foreach ($selectedCategories as $categoryId) {
         
            \App\Models\PageCategory::FirstORCreate([
                'page_id'=>$pageId,
                'content_id'=>$categoryId
            ]);
        }
        Session::flash('success', "The page has been assigned to the category");
        return redirect()->route('assign');

    }

    public function destroy(PageCategory $page_category)
    { 
        $page_category->delete();
       Session::flash('success', "Category has been deleted successfully");
      return redirect()->route('assign');
    }
}
