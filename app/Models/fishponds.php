<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fishponds extends Model
{
    use HasFactory;
    protected $fillable = [
        'Pond_Id','Pond_name','locationi'
        //,'Fish_Id'
   ];
}
