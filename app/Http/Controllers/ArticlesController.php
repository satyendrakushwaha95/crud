<?php

namespace App\Http\Controllers;

use App\Article; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Use Route;
// use App\Http\Requests;
// use App\Http\Controllers\Request;
use App\Http\Requests\ArticleRequest;

use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;


class ArticlesController extends Controller
{
    
    public function index()
    {
        $result = Article::orderBy("id","desc");
        if(Input::get("searchid")){
            $result=$result->where("id",Input::get("searchid"));
        }

        if(Input::get("searchtitle")){
            $result=$result->where("title",'like','%'.Input::get("searchtitle").'%');
        }
        if(Input::get("searchbody")){
            $result=$result->where("body",'like','%'.Input::get("searchbody").'%');
        }

            $result=$result->paginate(5);
           $articles  =$result;
           return view ('articles.index',compact('articles'));

        // $data=Article::latest('created_at');
        // $articles=$data->paginate(10);
        // $articles->setPath('articles');
        // return view ('articles.index',compact('articles'));  
      }

    
    public function create()
    {

        return view ('articles.create');
    }

    
    public function store(ArticleRequest $request)
    {
        
        Article::create($request->all());
        return redirect('articles')->with('success','Item created successfully');



        // Article::create($request->all());
        // return redirect('articles')->with('success','Item created successfully');
    }

   
    public function show($id)
    {
        $article=Article::findOrfail($id);
        return view('articles.show', compact('article'));
    }

   
    public function edit()
    {
        $id=Input::get('id');
         $article=Article::findOrfail($id);
        return view('articles.edit',compact('article'));
    }

   
    public function updateData(ArticleRequest $request)
    {
         //print_r(Input::all());exit; TO PRINT AT THIS INSTANCE
          // $article->update($request->all());
            // $article->title = $request->title;
            // $article->body = $request->body;


        $id=Input::get('id');
         $article=Article::find($id);
        $article->title = Input::get('title');
        $article->body = Input::get('body');
      
            $article->update();
            return response()->json(['success'=>'Data Updated']);
    }

   
    public function destroy($id)
    {
        $article=Article::find($id)->delete();
        //return response()->json($article);
        return redirect()->route('articles.index')->with('success','Item deleted successfully');

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

    
        public function addArticle()
   
    {
        $article= new Article;
        $article->title = Input::get('title');
        $article->body = Input::get('body');
        $article->save();
        // Article::create(Input::all());
           //$input = request()->all();
            //Article::create(Input::all());
        return response()->json(['success'=>'Data Submitted']);

    }

    function deleteData(Request $request)
    {
        $article= Article::find($request->input('id'));
        if($article->delete())
        {
            echo 'Data Deleted';
        }


    }

    private function createCsv(Collection $modelCollection, $articles){
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(Schema::getColumnListing($articles));
        foreach ($modelCollection as $data)
            {
                $csv->insertOne($data->toArray());
            }
        $csv->output($articles . '.csv');
    }

    public function getArticles(){

        $articles = Article::all();
        $this->createCsv($articles, 'articles');
    }

}
