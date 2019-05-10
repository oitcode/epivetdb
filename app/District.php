<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'district';

    /* Primary key */
    protected $primayKey = 'district_id';


    /*
    |--------------------------------------------------------------------------
    | Relationship with state table.
    |--------------------------------------------------------------------------
    |
    | Has many-to-one relationship with state table.
    |
    */

    public function state()
    {
        /**
         * 2nd arg: name of foreign key column in district table
         * 3rd arg: name of primary key column in state table
         */
        return $this->belongsTo('App\State', 'state_id', 'state_id');
    }
}
