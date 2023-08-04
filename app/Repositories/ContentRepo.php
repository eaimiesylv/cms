<?php
namespace App\Repositories;
use App\Models\Content;
use Illuminate\Database\QueryException;


class ContentRepo{
	
	
	public function all(){
		
		return Content::paginate(15);
	}
}













?>