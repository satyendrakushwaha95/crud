@extends('layouts.app')
@section('content')

<h1> Write your Articles <a href="{{url('articles')}}" class="btn btn-info" role="button">Back</a></h1>
<hr/>

{!! Form::open(['url'=>'articles']) !!} 

@include('articles.form',['submitButtonText'=>'Add Article'])

{!! Form::close() !!}

@include('errors.list')

@endsection
