<?php
namespace App\Repositories;
use App\Models\Content;
use Illuminate\Database\QueryException;


class ContentRepo{
	
	
	public function all(){
		
		return Content::paginate(15);
	}
	public function allcategories(){
		
		return Content::select('id','name')->get();
	}
	public function pageCategory($page){
		$pages=Content::select('id','name')->whereHas('page_category')->with('page_category.page:id,title');
		if($page == 'all'){
			return $pages->get();
		}
		else if($page == 'paginate'){
			return $pages->paginate(1);
		}else{
			return Content::select('id','name')->whereHas('page_category',function($query)use($page){
				$query->where('id', $page);
			})->with('page_category.page:id,title,content,post_image')->get();
		}
	}
}













?>