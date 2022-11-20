<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommended_treatment extends Model
{
    use HasFactory;
    protected $fillable = [
        'treat_Id','treatment_name','details','medications','Diseases_Id'
        
    ];
}
