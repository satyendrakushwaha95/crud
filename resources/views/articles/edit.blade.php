@extends('layouts.app')
@section('content')

<h3>Edit: {!! $article->title !!}</h3>
<hr/>

{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update', $article->id]]) !!} 

@include('articles.form',['submitButtonText'=>'Edit Article'])


</div>
{!! Form::close() !!}

@include('errors.list')

@endsection