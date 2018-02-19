
@extends('layouts.app')
@section('content')

<h1> Articles 
<a class="btn btn-success" href="{{url('/articles/create')}}">
                                    Add New Article
                                </a>
 </h1>

   <!-- for message -->
    @if ($message = Session::get('success'))
       <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif

<div class="container" >
<table class="table"> 
<tr class="danger">
<th>ID</th>
<th>Name </th>
<th>Body </th>
<th>Time </th>
<th>Action</th>
</tr>
@foreach($articles as $article)
<tr class="info">
<td>{{ $article->id }}</td>
<td><a href="{{ action('ArticlesController@show',[$article->id]) }}"> {{ $article->title }} </a> </td>
<td>{{ $article->body}}</td>
<td>{{$article->created_at}}</td>
<td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
</td>
</tr>
@endforeach

</table>
<?php echo $articles->render(); ?>





@endsection



