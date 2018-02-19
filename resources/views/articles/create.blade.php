@extends('layouts.app')
@section('content')

<h1> Write your Articles </h1>
<hr/>

{!! Form::open(['url'=>'articles']) !!} 

@include('articles.form',['submitButtonText'=>'Add Article'])

{!! Form::close() !!}

@include('errors.list')

@endsection
