
@extends('layouts.app')
@section('content')

<h1>Blog Homepage
<a class="btn btn-success" href="{{url('/blogs/create')}}">
                                    Add
                                </a></h1>
<div class="container" >
<table class="table"> 
<tr class="danger">
<th>Blog</th>
<th>Blog Body</th>
</tr>
@foreach($blogs as $blog)
<tr class="info">
<td>{{$blog->id}}
<td><a href="{{ action('BlogsController@show',[$blog->id]) }}">{{$blog->title}}</a>
<td>{{$blog->content}}</td>
</tr>
@endforeach
</table>
<?php echo $blogs->render(); ?>

</div>

@endsection