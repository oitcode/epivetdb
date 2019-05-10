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
    protected $primayKey = 'state_id';
}
