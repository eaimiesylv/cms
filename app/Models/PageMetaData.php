<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMetaData extends Model
{
    use HasFactory;
    protected $fillable=['page_id','meta_data_id','meta_description'];
    protected $hidden=['created_at','updated_at'];
    public function metadata(){
        return $this->belongsTo(MetaData::class,'meta_data_id','id');
    }
}
