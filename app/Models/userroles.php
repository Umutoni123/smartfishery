<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userroles extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
    protected $fillable = [
        'id', 'user_id', 'location_id', 'cooperative_id'
    ];
}
