<?php
namespace App\Repositories;
use App\Models\MetaData;
use Illuminate\Database\QueryException;


class MetaDataRepo{
	
	
	public function all(){
		
		return MetaData::select('id','meta_name')->get();
	}
}













?>