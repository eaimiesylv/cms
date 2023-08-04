<?php
namespace App\Repositories;
use App\Models\Page;
use Illuminate\Database\QueryException;


class PageRepo{
	
	
	public function all(){
		
		return Page::paginate(15);
	}
}













?>