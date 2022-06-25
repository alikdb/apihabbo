<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgesNameModel extends Model
{
    protected $table = 'badges_name';
    protected $fillable = [
        'hotel',
        'code',
        'name',
        'times'
    ];
    public $timestamps = false;
    use HasFactory;
}
