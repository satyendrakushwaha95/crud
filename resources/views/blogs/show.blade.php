@extends('layouts.app')
@section('content')
<div class="container">
<a class="btn btn-success" href="{{url('blogs')}}">
                                    Back
                                </a>

<h1>Title: <span STYLE="color:blue;font-weight:bold;font-size:18pt">{{$blog->title}} </span></h1>



<span STYLE="color:red;font-weight:bold;font-size:18pt">Content: </span>{{ $blog->content }}
<br>

<span STYLE="color:red;font-weight:bold;font-size:18pt">File: </span> 
<a target="_blank" href="{{ URL::asset("storage/{$blog->file}") }}">{{ $blog->file }}</a>


<!-- <img src='{{ asset($blog->file) }}'> 

{{ Html::image('$blog->file') }} -->

</div>
@endsection