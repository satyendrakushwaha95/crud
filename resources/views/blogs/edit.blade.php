@extends('layouts.app')
@section('content')


<div class="container">
<h3>Edit: {!! $blog->title !!}</h3><a class="btn btn-danger" href="{{url('blogs')}}">Back</a>
<hr/>
<!-- <form method="post" enctype="multipart/form-data" action="{{ url('BlogsController@update') }}" accept-charset="UTF-8"> -->
{!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update', $blog->id]]) !!} 
<div class="form-group">

{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->

<div class="form-group">

{!! Form::label('content', 'Content:') !!}
{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>

 <div class="form-group">
{!! Form::label('file', 'Choose file to upload:') !!}
<!-- {!! Form::file('file') !!}--> 
{!! Form::file('file', array('class' => 'image')) !!}
File:<a target="_blank" href="{{ URL::asset("storage/{$blog->file}") }}">{{ $blog->file }}</a><br>

<div class="form-group">
@foreach($blog->hasArticle as $k=>$v)

{{$v->title}}<br>

@endforeach
</div>
</div> 

 <!-- submit button -->

<div class="form-group">
 <button type="submit" class="btn btn-success">Update</button>  
</div>
</div>
{!! Form::close() !!}
@include('errors.list')
@endsection