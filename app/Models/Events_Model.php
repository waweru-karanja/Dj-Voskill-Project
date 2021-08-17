<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events_Model extends Model
{
    use HasFactory;
    protected $table='Events';
    protected $primarykey='id';
    protected $fillable=['eve_name','eve_details','eve_location','eve_time','eve_image'];
}
