@extends('layouts.app')
@section('content')
<div class="container">

<h3>Edit: {!! $blog->title !!}</h3><a class="btn btn-danger" href="{{url('blogs')}}">Back</a>
<hr/>

{!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update', $blog->id]]) !!} 

@include('blogs.blog',['submitButtonText'=>'Update Blog'])


</div>
{!! Form::close() !!}

@include('errors.list')

@endsection