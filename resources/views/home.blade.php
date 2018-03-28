
@extends('layouts.app')

@section('content')


<div class="container">
  <div class="jumbotron">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <h1><center> Welcome </center></h1>
                </div>

                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  
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
