<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'state';

    /* Primary key */
    protected $primaryKey = 'state_id';


    /*
    |--------------------------------------------------------------------------
    | Relationship with district table.
    |--------------------------------------------------------------------------
    |
    | Has one-to-many relation with district table.
    |
    */

    /**
     * 2nd arg: name of foreign key column in district table
     * 3rd arg: name of primary key column in state table
     */
    public function districts()
    {
        return $this->hasMany('App\District', 'state_id', 'state_id');
    }
}
