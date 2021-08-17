<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    use HasFactory;
    protected $fillable = ['blogcat_title'];

    // function blogcategor(){
    //     return $this->belongsTo('App\Models\Blogcategory','cat_id','id');
    // }
}
