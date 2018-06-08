<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Use Route;
use Auth;
use App\User;

class ACLController extends Controller
{
   public function adminPanel(){

   	$user= Auth::user();
    $user= User::all();
   	return view ('admin.adminPanel')->with(['user' => $user]);
   }
}
