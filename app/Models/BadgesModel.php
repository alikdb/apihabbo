<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgesModel extends Model
{
    protected $table = 'badges';
    protected $primaryKey = 'code';
    protected $fillable = [
        'code'
    ];
    use HasFactory;
}
