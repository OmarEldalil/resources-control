<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{

    protected $fillable = ['city' , 'address' , 'description' , 'owner' , 'renter' , 'contract_start_date' , 'contract_end_date' , 'rental_cost' , 'payment_method' , 'insurance' , 'annual_raise' , 'notes'];

    public function images ()
    {

        return $this->hasMany('App\Models\RentalImage');

    }

}
