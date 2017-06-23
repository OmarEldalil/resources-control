<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'authority' , 'code' , 'abilities'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee () {

        return $this->belongsTo('App\Models\Employee' , 'code' , 'code');

    }


    public function vacationRequests ()
    {

        return $this->hasMany('App\Models\VacationRequest');

    }

    public function canEdit ($editable) {

        if ($this->abilities ) {
            return in_array($editable , json_decode($this->abilities)) ? true : false;
        }

        return false;

    }

    public function authority ($authority) {

        return $this->authority == $authority ? true : false;

    }

    public function abilities () {

        if ($this->abilities) {

            $abilities = array_map(function ($value) {
                return trans('user_abilities.' . $value);
            } , json_decode($this->abilities));

            return implode(' , ' , $abilities);

        }

        return null;

    }

    public function getUserAbilitiesAttribute () {

        if ($this->abilities) {
            $data = [];

            foreach ( json_decode($this->abilities) as $ability ) {

                $data[$ability] = true;

            }

            return $data;
        }

        return null;

    }

    public function usersCanEdit ($ability)
    {

        return $this->all()->map(function ($user , $key) use ($ability) {
            return $user->canEdit($ability);
        });

    }

}
