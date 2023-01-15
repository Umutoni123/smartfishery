<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondDiseases extends Model
{
    use HasFactory;
    protected $table = 'pond_diseases';
    protected $fillable = [
        'id', 'pond_id', 'fish_disease', 'status'
    ];
}
