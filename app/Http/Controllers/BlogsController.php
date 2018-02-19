<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Http\Requests;
use Request; 


class BlogsController extends Controller
{
    

    public function index(){
    /*	$blogs=Blog::all();
     return $blogs;
    	return view ('blogs.index',compact('blogs'))	;
	*/
    	$data=Blog::latest('created_at');
        $blogs=$data->paginate(5);
        $blogs->setPath('blogs');
    	return view ('blogs.index',compact('blogs'));
    }


    public function create()
    {
      	return view ('blogs.create');
	}

	
	public function show($id)
	{
		$blog=Blog::find($id);
		return view('blogs.show', compact('blog'));
	}

	public function store()
	{
		$input=Request::all();

    	Blog::create($input);

    	return redirect('blogs');
	}

}