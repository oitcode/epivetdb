<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    /* Check if the user is admin. */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }


    /*
    |--------------------------------------------------------------------------
    | Relationship with other tables.
    |--------------------------------------------------------------------------
    |
    | Basically one user will create many records for a given table. So, mostly
    | user will have one-to-many relation with most of the tables.
    |
    */

    /**
     * 2nd arg: name of foreign key column in other table
     * 3rd arg: name of primary key column in user table
     */
    public function animals()
    {
        return $this->hasMany('App\Animal', 'creator_id', 'id');
    }

    public function diseases()
    {
        return $this->hasMany('App\Disease', 'creator_id', 'id');
    }

    public function statuses()
    {
        return $this->hasMany('App\Status', 'creator_id', 'id');
    }
}
