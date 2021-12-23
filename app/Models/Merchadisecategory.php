<?php

namespace App\Models;

use App\Models\Merchadise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchadisecategory extends Model
{
    use HasFactory;
    protected $table = 'merchadisecategories';

    protected $fillable = ['merchadisecat_title','category_discount'];
    
    
}
