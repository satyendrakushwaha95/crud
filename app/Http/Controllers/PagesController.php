<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
