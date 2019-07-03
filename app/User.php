<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation to Roles table
     * A user can have many roles
     */
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    /**
     * Helper Function HasAnyRoles
     * @param array roles
     */
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Helper Function HasAnyRole
     * @param string role
     */
    public function hasAnyRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }
}
