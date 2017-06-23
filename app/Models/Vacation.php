<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{

    protected $fillable = ['employee_code' , 'annual' , 'casual' , 'sick' , 'rest' , 'created_at' , 'updated_at'];

    public function employee () {

        return $this->belongsTo('App\Models\Employee' , 'employee_code' , 'code');

    }

    public function getTotalAttribute () {

        return $this->annual + $this->sick + $this->casual;

    }

    public function scopeAvailable ($query)
    {
        return $query->where('created_at' , '<=' , Carbon::now());
    }

}
