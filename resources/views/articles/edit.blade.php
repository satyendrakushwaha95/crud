@extends('layouts.app')
@section('content')

<h3>Edit: {!! $article->title !!} <a href="{{url('articles')}}" class="btn btn-info" role="button">Back</a></h3> </hr>

{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update', $article->id]]) !!} 

@include('articles.form',['submitButtonText'=>'Update Article'])


</div>
{!! Form::close() !!}

@include('errors.list')

@endsection