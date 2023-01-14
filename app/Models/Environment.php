<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;
    protected $table = 'pond_environments';
    protected $fillable = [
        'id', 'temperature', 'ph', 'pond_id', 'fish_type'
    ];
    protected $primaryKey = 'Env_Id';
}
