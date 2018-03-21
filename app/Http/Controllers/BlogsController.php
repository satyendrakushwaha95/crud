<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        $data=Blog::latest('created_at');
        $blogs=$data->paginate(7);
        $blogs->setPath('blogs');
        return view ('blogs.index',compact('blogs'));  
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
        
        
        $file=Input::file('file');

        $blog= new Blog;
        $blog->title = Input::get('title');
        $blog->content = Input::get('content');
        $destinationPath = 'storage';      
        $blog->save();
        $blogId=$blog->id;
        $file->move($destinationPath,$blog->id.'-'.$file->getClientOriginalName()); 
        $BlogUpdate=Blog::find($blog->id);
        $BlogUpdate->file=$blog->id.'-'.$file->getClientOriginalName();
        $BlogUpdate->update();
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
       $arr = ['id', 'title', 'content'];
       $blog = Blog::get(['id', 'title', 'content']);
       $sampleBlog = [];
       array_push($sampleBlog, $arr);
       $arrP = [];
       $i = 0;
       foreach ($blog as $bg) {
           $details = [
               $bg->id,
               $bg->title,
               $bg->content,

           ];
           array_push($sampleBlog, $details);
       }
       return $this->getCsv($sampleBlog, 'blog_data.csv', ',');
   }

}
