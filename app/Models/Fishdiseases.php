<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fishdiseases extends Model
{
    use HasFactory;
    protected $fillable = [
        'Diseases_Id','Disease_name', 'Pond_Id','Fish_Id','Location_ID'
   ];
}




