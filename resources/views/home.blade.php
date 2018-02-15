@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Welcome!!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Here you can add your blogs:
                    
                    <a href="{{route('blog')}}" class="btn btn-default"> Add Blog
                    </a>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
