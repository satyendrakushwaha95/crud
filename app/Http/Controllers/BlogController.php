<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    

public function index()
    {
        $blogs= Blog::all();
//return $blogs;
        return view('blogs.index', compact('blogs'));
    }

public function create()
{
	return view ('blogs.create');
}


 }