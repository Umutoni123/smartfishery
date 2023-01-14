<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fishtypes extends Model
{
    use HasFactory;
    protected $table = 'fish_types';
    protected $fillable = [
        'id',
        'fish_name',
   ];
}

