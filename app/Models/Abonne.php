<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function categorie()
    {
        return $this->BelongsTo('App\Models\Categorie');
    }

    public function recette()
    {
        return $this->HasOne('App\Models\Recette');
    }

    public function reclamation()
    {
        return $this->HasOne('App\Models\Reclamation');
    }

    


    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasAnyRoles($roles) {
        if($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }
    
    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
