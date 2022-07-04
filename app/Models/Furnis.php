<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furnis extends Model
{
    use HasFactory;
    protected $table = 'furnis';
    protected $fillable = ['hotel_id', 'name', 'code', 'revision', 'description', 'category'];
}
