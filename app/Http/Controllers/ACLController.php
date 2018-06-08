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

   	return view ('admin.adminPanel');
   }
   public function adminPanelEdit(){

   	return view ('admin.adminPanelEdit');
   }
}
