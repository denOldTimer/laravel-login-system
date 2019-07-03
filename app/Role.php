<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //




     /**
     * Relation to User table
     * A role can belongtoMany users
     */
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
