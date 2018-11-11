<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Initialization
    protected $table = 'tbl_event';

    protected $dates = [
        'created_at',
        'updated_at',
        'start_event',
        'end_event'
    ];
}
