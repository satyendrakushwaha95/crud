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
    public function about()

    {
   	
    	$people=[
    		'Satyendra', 'Vicky','Infini'
    		];

    		
    	return view ('pages.about',compact('people'));
    }

     public function contact()
    {
        return view('pages.contact');
    }

     public function profile()
    {
    $user = Auth::user();
    $user= User::all();
    $location = Location::all();
    $salary = Salary::all();
    return view ('pages.profile',compact('user','location','salary'));
   // return view('pages.profile')->with(['user' => $user]);
    }


}
