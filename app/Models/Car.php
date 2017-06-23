<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $fillable = ['car_number','car_model','car_year','office','car_license_date','examination_date','driver_name','driver_license_date','license_type','vendor','car_front_license','car_back_license','driver_front_id','driver_back_id','driver_front_license','driver_back_license'];

}
