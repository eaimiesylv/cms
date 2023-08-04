<?php
namespace App\Trait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;


Trait HandleException{
	
	
	public function tryCatch(callable $query, $response){
		
		try{
			$query();
			Session::flash('success', $response);
        } catch (QueryException $e) {
            //Session::flash('error', 'The following error occur.'. $e->getMessage());
			Session::flash('error', 'The following error occur.');
        }
	}
}













?>