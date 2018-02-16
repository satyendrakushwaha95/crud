@extends('layouts.app')
@section('content')

<h1> Show Page </h1>

<h1>{{$blog->title}} </h1>


<article>

{{ $blog->content }}

</article>


@endsection