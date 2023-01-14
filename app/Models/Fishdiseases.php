<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishdiseases extends Model
{
    use HasFactory;
    protected $table = 'fish_diseases';
    protected $fillable = [
        'id','name','symptoms','medication','medication_details',
    ];
    protected $primaryKey = 'Diseases_Id';
}
