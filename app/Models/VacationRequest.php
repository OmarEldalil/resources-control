<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacationRequest extends Model
{

    protected $fillable = ['employee_code' , 'start_date' , 'end_date' , 'vacation_type' , 'sick_image' , 'vacation_duration' , 'status' , 'user_id'];

    public function employee () {

        return $this->belongsTo('App\Models\Employee' , 'employee_code' , 'code');

    }

    public function user () {

        return $this->belongsTo('App\Models\User');

    }

}
