<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;
    protected $fillable=['meta_name'];
    protected $hidden=['created_at','updated_at'];

    public function pagemetadata(){
        return $this->hasMany(PageMetaData::class,'meta_data_id','id');
    }
}
