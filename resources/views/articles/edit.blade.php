@extends('layouts.app')
@section('content')

<h3>Edit: {!! $article->title !!}</h3>
<hr/>

{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update', $article->id]]) !!} 

<!-- Name field -->
<div class="form-group">

{!! Form::label('title', 'Edit Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->

<div class="form-group">

{!! Form::label('body', 'Edit Body:') !!}
{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

 <!-- submit button -->

<div class="form-group">
{!! Form::submit ('Edit Article', ['class'=> 'btn btn-primary from-control']) !!}
</div>


</div>
{!! Form::close() !!}

@if ($errors->any())
<ul class="alert alert-danger">
	@foreach($errors->all() as $error)
	<li> {{$error}} </li>
@endforeach
</ul>
@endif

@endsection