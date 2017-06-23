<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalImage extends Model
{

    protected $fillable = ['rental_id' , 'image_name'];

    public function rental ()
    {

        return $this->belongsTo('App\Models\Rental');

    }

}
