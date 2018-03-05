<?php
/*
namespace App\Http\Controllers;

use App\Article; 
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    public function index()
    {
    	$data=Article::latest('created_at');
        $articles=$data->paginate(2);
        $articles->setPath('articles');
    	return view ('articles.index',compact('articles'));

    }

    public function show($id)
    {
    	$article=Article::findOrfail($id);
    	return view('articles.show', compact('article'));
    }

 public function create()
    {
    	return view ('articles.create');
    }

  public function store(CreateArticleRequest $request)
    { 

        Article::create($request->all());
    	return redirect('articles');
    }

  public function edit($id)
{
    $article=Article::findOrfail($id);
    return view('articles.edit',compact('article'));
}
 
} 
