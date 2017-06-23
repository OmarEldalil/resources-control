<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index ()
    {

        $user = request()->user();

        return view ('website.home' , compact('user'));

    }

}
