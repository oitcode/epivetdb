<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseReport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'disease_report';

    /* Primary key */
    protected $primaryKey = 'disease_report_id';

    /*
    |--------------------------------------------------------------------------
    | Relationship with other tables.
    |--------------------------------------------------------------------------
    |
    */

    /* Relationship with user. */
    public function creator()
    {
        /**
         * 2nd arg: name of foreign key column in disease_report table
         * 3rd arg: name of primary key column in user table
         */
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /* Relationship with local_body. */
    public function local_body()
    {
        return $this->belongsTo('App\LocalBody', 'local_body_id', 'local_body_id');
    }

    /* Relationship with disease. */
    public function disease()
    {
        return $this->belongsTo('App\Disease', 'disease_id', 'disease_id');
    }

    /* Relationship with sepcies (animal). */
    public function animal()
    {
        return $this->belongsTo('App\Animal', 'animal_id', 'animal_id');
    }
}
