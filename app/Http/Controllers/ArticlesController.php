<?php

namespace App\Http\Controllers;

use App\Article; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Use Route;
// use App\Http\Requests;
// use App\Http\Controllers\Request;
use App\Http\Requests\ArticleRequest;


class ArticlesController extends Controller
{
    
    public function index()
    {
        $data=Article::latest('created_at');
        $articles=$data->paginate(4);
        $articles->setPath('articles');
        return view ('articles.index',compact('articles'));  
      }

    
    public function create()
    {
        return view ('articles.create');
    }

    
    public function store(ArticleRequest $request)
    {
        
        Article::create($request->all());
        return redirect('articles')->with('success','Item created successfully');
    }

   
    public function show($id)
    {
        $article=Article::findOrfail($id);
        return view('articles.show', compact('article'));
    }

   
    public function edit($id)
    {
         $article=Article::findOrfail($id);
        return view('articles.edit',compact('article'));
    }

   
    public function update(ArticleRequest $request, $id)
    {
        $article=Article::findOrfail($id);
        $article->update($request->all());

        return redirect('articles');

    }

   
    public function destroy($id)
    {
        $article=Article::find($id)->delete();
        return redirect()->route('articles.index')
        ->with('success','Item deleted successfully');

    }

     
      public function down()
    {
        $articles=Article::get();
       // dd($articles);
        $data=['article'=>$articles];
        return view('pages.articledown',$data);
    }

    
    public function showDown()
    {
        $jsonArray=Array();
        $id=Input::get("id");
        $article=Article::find($id);
        $jsonArray['error']='success';
        $jsonArray['article']=$article;
        return json_encode($jsonArray);
    }

}
