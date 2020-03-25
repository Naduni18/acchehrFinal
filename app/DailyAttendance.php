<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAttendance extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'date','start','end',
    ];
}
