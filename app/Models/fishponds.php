<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fishponds extends Model
{
    use HasFactory;
    protected $table = 'fish_ponds';
    protected $fillable = [
        'id', 'name', 'cooperative_id'
    ];
}
