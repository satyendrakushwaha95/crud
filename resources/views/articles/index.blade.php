
@extends('layouts.app')
@section('content')

<h1> Articles 
<a class="btn btn-success" href="{{url('/articles/create')}}">
                                    Add
                                </a> </h1>

<div class="container" >
<table class="table"> 
<tr class="danger">
<th>ID</th>
<th>Name </th>
<th>Body </th>
<th>Time </th>
</tr>
@foreach($articles as $article)
<tr class="info">
<td>{{ $article->id }}</td>
<td><a href="{{ action('ArticlesController@show',[$article->id]) }}"> {{ $article->title }} </a> </td>
<td>{{ $article->body}}</td>
<td>{{$article->created_at}}</td>
</tr>
@endforeach

</table>
<?php echo $articles->render(); ?>





@endsection



