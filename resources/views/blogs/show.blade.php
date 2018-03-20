@extends('layouts.app')
@section('content')
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
}
</style>
<div class="container">
<a class="btn btn-success" href="{{url('blogs')}}">
                                    Back
                                </a>

<h1>Title: <span STYLE="color:blue;font-weight:bold;font-size:18pt">{{$blog->title}} </span></h1>



<span STYLE="color:red;font-weight:bold;font-size:18pt">Content: </span>{{ $blog->content }}
<br>

<span STYLE="color:red;font-weight:bold;font-size:18pt">File: </span> 
<a target="_blank" href="{{ URL::asset("storage/{$blog->file}") }}">{{ $blog->file }}</a><br>


<span STYLE="color:red;font-weight:bold;font-size:18pt">Article : </span> 
@foreach($blog->hasArticle as $k=>$v)
<table>
  <tr>
    <th>Title:</th>
    <td>{{$v->title}}</td>
  </tr>
 </table>


@endforeach
<!-- <img src='{{ asset($blog->file) }}'> 

{{ Html::image('$blog->file') }} -->

</div>
@endsection