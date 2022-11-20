<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fishtypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'fish_name','coopid'
   ];
}

