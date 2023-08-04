<?php
namespace App\Repositories;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class PageRepo{
	
	
	public function all(){
	

		return Page::select('id', 'title', DB::raw("CONCAT(SUBSTRING_INDEX(content, ' ', 5), '...') as content"))
		->with('page_metadata','page_metadata.metadata')
		->paginate(20);
		

	}

	public function findById($page){
	
		return $page->load('page_metadata','page_metadata.metadata');
		/*return Page::where('id', $id)->select('id', 'title','content')
		->with('page_metadata','page_metadata.metadata')
		->get();*/
		

	}
	public function allpagies(){
		
		return Page::select('id','title')->get();
	}
}













?>