@extends('layouts.app')
@section('content')

<h1> Articles 
<a class="btn btn-success" href="{{url('/articles/create')}}">
                                    Add
                                </a> </h1>

@foreach($articles as $article)
 
<article>

<h2>


<a href="{{ action('ArticlesController@show',[$article->id]) }}"> {{ $article->title }} </a>

</h2>

<div class="body"> {{ $article->body }} </div>

</article>

@endforeach

@endsection