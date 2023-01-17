<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordings extends Model
{
    use HasFactory;
    protected $fillable = [
        "entry_id", "temperature", "turbidity", "dissolved_oxygen", "ph", "ammonia", "nitrate", "population", "fish_length", "fish_weight", "fishPondId"
    ];
    protected $primaryKey = 'entry_id';
}
