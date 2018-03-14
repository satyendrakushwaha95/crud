<?php

namespace App\Http\Controllers;

use App\Blog; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        
        
        $file=Input::file('file');

        $blog= new Blog;
        $blog->title = Input::get('title');
        $blog->content = Input::get('content');
        $destinationPath = 'storage';      
        $blog->save();
        $blogId=$blog->id;
        $file->move($destinationPath);  
        $BlogUpdate=Blog::find($blog->id);
        $BlogUpdate->file=$blog->id.'-'.$file->getClientOriginalName();
        $BlogUpdate->update();
        
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
