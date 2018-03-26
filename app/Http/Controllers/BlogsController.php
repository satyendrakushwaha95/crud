<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Has_file;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Use Route;
// use App\Http\Requests;
// use App\Http\Controllers\Request;
use App\Http\Requests\BlogRequest;

use Illuminate\Database\Eloquent\Collection;
use League\Csv\Writer;
use Schema;
use SplTempFileObject;


class BlogsController extends Controller
{
    
    public function index()
    {
      $user= auth()->user();
      $user_id= auth()->user()->id;
      $user_role= auth()->user()->role;
      $blogs=Blog::orderBy("id","desc");
  
      //search field me lane k liye variable banane ka fir usko btane ka  - 
      // $searchid = Input::get("searchid");
      // $searchtitle = Input::get("searchtitle");
      // $searchbody = Input::get("searchbody");
      // if(Input::has("searchid")){
      //     $blogs=$blogs->where("id",Input::get("searchid")); }


       if($user_role==2){
           $blogs=$blogs->where('user_id',$user_id);
       }

        // $user=User::all();
        // $user_id= auth()->user()->id;
        // $blogs=Blog::where('user_id',$user_id);
        //dd($blogs);

        //$result = Blog::orderBy("id","desc");
        
        if(Input::get("searchid")){
            $blogs=$blogs->where("id",Input::get("searchid"));
        }

        if(Input::get("searchtitle")){
            $blogs=$blogs->where("title",'like','%'.Input::get("searchtitle").'%');
        }
        if(Input::get("searchcontent")){
            $blogs=$blogs->where("content",'like','%'.Input::get("searchcontent").'%');
        }

           //  $result=$result->paginate(10);
           $blogs  = $blogs->paginate(10);

       return view ('blogs.index',compact('blogs','searchid'));  
      }

    
    public function create()
    {
        $articles=Article::get();
        $data=['articles'=>$articles];
        return view ('blogs.create',$data);
    }

    // public function createblog()
    // {
    //     $articles=Article::get();
    //     dd($articles);
    //     $data=['articles'=>$articles];
    //     return view ('blogs.createblog',$data);
    // }

    
    public function store(BlogRequest $request)
    {
        
        
       // $files=Input::file('file');
        $file=Input::file('file');
        $blog= new Blog;
        $blog->title = Input::get('title');
        $blog->content = Input::get('content');
    //to strore by id 
        $blog->user_id = auth()->user()->id;
        $destinationPath = 'storage/uploads';      
        $blog->save();
       
      foreach (Input::file('file') as $key => $value) :
     //  dd($value);
       $saveImgs=new Has_file;
        $blogId=$blog->id;
       $fileName = "file" . $key . date("YmdHis") . "." . $value->getClientOriginalExtension();
      // dd($fileName);
        $value->move($destinationPath,$fileName);       
        
        $saveImgs->blog_id=$blog->id;
            $saveImgs->file=$fileName;
            $saveImgs->save();        
   
        // $BlogUpdate=Blog::find($blog->id);
        // $BlogUpdate->file=$blog->id.'-'.$file->getClientOriginalName();
        // $BlogUpdate->update();

  endforeach;

        $blog->hasArticle()->sync(Input::get('article'));
        return redirect('blogs')->with('success','Item created successfully');
    
    }

   
    public function show($id)
    {
        $blog=Blog::findOrfail($id);
        return view('blogs.show', compact('blog'));
    }

   
    public function edit($id)
    {

         $articles=Article::get();
         $blog=Blog::findOrfail($id);
         $file=Input::file('file');
         $files=new Has_file;
         $files=Has_file::get();
         $files=Has_file::find($id);
         
        return view('blogs.edit',compact('blog','articles','files'));
    }

   
    public function update(BlogRequest $request, $id)
    {   

        $blog=Blog::findOrfail($id);
        $blog->update($request->all());
        $blog->hasArticle()->sync(Input::get('article'));

        return redirect('blogs');



    }

   
    public function destroy($id)
    {
        $blog=Blog::find($id)->delete();
        return redirect()->route('blogs.index')
        ->with('success','Item deleted successfully');

    }

     private function createCsv(Collection $modelCollection, $blogs){
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(Schema::getColumnListing($blogs));
        foreach ($modelCollection as $data)
            {
                $csv->insertOne($data->toArray());
            }
        $csv->output($blogs . '.csv');
    }

    public function getBlogs(){

        $blogs = Blog::all();
        $this->createCsv($blogs, 'blogs');
    }


     public function getCsv($input_array, $output_file_name, $delimiter) {
       /** open raw memory as file, no need for temp files */
       $temp_memory = fopen('php://memory', 'w');
       /** loop through array  */
       foreach ($input_array as $line) {
           /** default php csv handler * */
           fputcsv($temp_memory, $line, $delimiter);
       }
       /** rewrind the "file" with the csv lines * */
      
       fseek($temp_memory, 0);
       /** modify header to be downloadable csv file * */
       header('Content-Type: application/csv');
       header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
       /** Send file to browser for download */
       fpassthru($temp_memory);

   }

      public function download() {
       $details = [];
       $arr = ['id', 'title', 'content','file'];
       $blog = Blog::get(['id', 'title', 'content','file']);
       $sampleBlog = [];
       array_push($sampleBlog, $arr);
       $arrP = [];
       $i = 0;
       foreach ($blog as $bg) {
           $details = [
               $bg->id,
               $bg->title,
               $bg->content,
               $bg->file,

           ];
           array_push($sampleBlog, $details);
       }
       //dd($sampleBlog);
       return $this->getCsv($sampleBlog, 'blog_data.csv', ',');
   }

}
