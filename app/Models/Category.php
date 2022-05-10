<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table="categories";

    public function section(){
        return $this->belongsTo(Section::class,'section_id')->select('id','name');
    }

    public function parentcategory(){
        return $this->belongsTo(Category::class,'parent_id')->select('id','category_name');
    }
}

