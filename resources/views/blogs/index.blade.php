
@extends('layouts.app')
@section('content')


<h1>Blog Homepage</h1>
@foreach($blogs as $blog)
<article>
<h2>{{$blog->title}}</h2>
<div class="body"><p>{{$blog->content}}</p></div>
</article>
@endforeach
@endsection