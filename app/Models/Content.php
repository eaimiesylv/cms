<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        
    ];
    public function page_category(){
        return $this->belongsTo(PageCategory::class,'content_id','page_id');
    }
}
