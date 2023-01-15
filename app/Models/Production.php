<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $table = 'production';
    protected $fillable = [
        'id', 'production_tons', 'environment_id'
    ];
}
