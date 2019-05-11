<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalBody extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'local_body';

    /* Primary key */
    protected $primaryKey = 'local_body_id';


    /*
    |--------------------------------------------------------------------------
    | Relationship with district table.
    |--------------------------------------------------------------------------
    |
    | Has many-to-one relationship with district table.
    |
    */

    public function district()
    {
        /**
         * 2nd arg: name of foreign key column in local_body table
         * 3rd arg: name of primary key column in district table
         */
        return $this->belongsTo('App\District', 'district_id', 'district_id');
    }

    /* A local body has many users. */
    public function users()
    {
        return $this->hasMany('App\User', 'local_body_id', 'local_body_id');
    }
}
