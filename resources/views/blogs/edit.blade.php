@extends('layouts.app')
@section('content')

<h3>Edit: {!! $blog->title !!}</h3>
<hr/>

{!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update', $blog->id]]) !!} 

@include('blogs.blog',['submitButtonText'=>'Update Blog'])


</div>
{!! Form::close() !!}

@include('errors.list')

@endsection