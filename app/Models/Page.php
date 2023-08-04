<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
   
    protected $fillable=['title','content','post_image'];

    public function page_metadata(){
        return $this->hasMany(PageMetaData::class,'page_id','id');
    }
}
