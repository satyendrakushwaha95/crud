<style> 
body {
    background-image: url("img_tree.gif"), url("paper.gif");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
}
</style>

@extends('layouts.app')

@section('content')


<div class="container">
  <div class="jumbotron">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <h3><center>This is your Homepage</center></h3></div>

                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Welcome</h2>
                    <strong>Created using Laravel 5.3</strong>
                    <br>
                    <center>
                    <h3> Click to post.!! </h3>
                                      
                    <a class="btn btn-success" href="{{ url('/articles') }}">
                                    Articles
                                </a>
                    <a class="btn btn-success" href="{{ url('/blogs') }}">
                                    Blogs
                                </a></center>
                </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
