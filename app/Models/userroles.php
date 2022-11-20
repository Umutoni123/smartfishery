<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userroles extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_Id','role_name','description','locationid'
        //'coop_ID'
    ];
}
