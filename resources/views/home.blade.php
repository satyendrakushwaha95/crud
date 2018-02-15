@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">This is your Homepage</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Welcome</h1>
                    <strong>Created using Laravel 5.3</strong>
                    <br>
                    <center>
                    <h3> Click to post.!! </h3>
                    <a class="btn btn-danger" href="{{ route('blogs') }}">
                                    Blogs
                                </a>
                    
                    <a class="btn btn-success" href="{{ route('articles') }}">
                                    Articles
                                </a></center>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
