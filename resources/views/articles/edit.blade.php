@extends('layouts.app')
@section('content')

<h3>Edit: {!! $article->title !!}</h3>
<hr/>

{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update', $article->id]]) !!} 

<span>@include('articles.form',['submitButtonText'=>'Update Article'])<a href="{{url('articles')}}" class="btn btn-info" role="button">Cancel</a></span>


</div>
{!! Form::close() !!}

@include('errors.list')

@endsection