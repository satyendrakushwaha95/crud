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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="page-header">
                <h1><center>This is your Homepage</center></h1></div>

                <div class="panel-body">
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
                                      
                    <a class="btn btn-success" href="{{ route('articles') }}">
                                    Articles
                                </a></center>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
