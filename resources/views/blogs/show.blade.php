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
<table>
  <tr>
    <th>File:</th>
@foreach($blog->hasFile as $k=>$v)
<a target="_blank" href="{{ URL::asset("storage/uploads{$v->file}") }}">
  <td>  {{ $v->file }}</td>
</a>
@endforeach
</tr></table>

<span STYLE="color:red;font-weight:bold;font-size:18pt">Article : </span> 
<table>
  <tr>
    <th>Title:</th>
    @foreach($blog->hasArticle as $k=>$v)
    <td>{{$v->title}}</td>
@endforeach
  </tr>
 </table>
<!-- <img src='{{ asset($blog->file) }}'> 

{{ Html::image('$blog->file') }} -->

</div>
@endsection