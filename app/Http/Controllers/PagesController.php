<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    return view('pages.profile')->with(['user' => $user]);
    }


}
