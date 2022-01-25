<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function abonne() 
    {
        return $this->belongsTo('App\Models\Abonne');
    }
}
