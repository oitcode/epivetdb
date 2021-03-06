<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'disease';

    /* Primary key */
    protected $primaryKey = 'disease_id';


    /*
    |--------------------------------------------------------------------------
    | Relationship with user table.
    |--------------------------------------------------------------------------
    |
    | Has many-to-one relationship with user table.
    |
    */

    public function creator()
    {
        /**
         * 2nd arg: name of foreign key column in animal table
         * 3rd arg: name of primary key column in user table
         */
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /* A disease body has many disease reports. */
    public function disease_reports()
    {
        return $this->hasMany('App\DiseaseReport', 'disease_id', 'disease_id');
    }
}
