<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;
use App\Salary;
use Auth;
Use Route;

class PagesController extends Controller
{

   
     public function profile()
    {
    return view ('pages.profile');
    }

    public function design1()
    {
        return view('pages.design1');
    }

     public function design2()
    {
        return view('pages.design2');
    }

      public function design3()
    {
        return view('pages.design3');
    }

      public function design4()
    {
        return view('pages.design4');
    }
}
