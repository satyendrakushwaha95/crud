<?php

namespace App\Http\Controllers;

use App\Blog; 
use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Http\Controllers\Request;
use App\Http\Requests\BlogRequest;


class BlogsController extends Controller
{
    
    public function index()
    {
        $data=Blog::latest('created_at');
        $blogs=$data->paginate(4);
        $blogs->setPath('blogs');
        return view ('blogs.index',compact('blogs'));  
      }

    
    public function create()
    {
        return view ('blogs.create');
    }

    
    public function store(BlogRequest $request)
    {
        
        Blog::create($request->all());
        return redirect('blogs')->with('success','Item created successfully');
    }

   
    public function show($id)
    {
        $blog=Blog::findOrfail($id);
        return view('blogs.show', compact('blog'));
    }

   
    public function edit($id)
    {
         $blog=Blog::findOrfail($id);
        return view('blogs.edit',compact('blog'));
    }

   
    public function update(BlogRequest $request, $id)
    {
        $blog=Blog::findOrfail($id);
        $blog->update($request->all());

        return redirect('blogs');

    }

   
    public function destroy($id)
    {
        $blog=Blog::find($id)->delete();
        return redirect()->route('blogs.index')
        ->with('success','Item deleted successfully');

    }
}
