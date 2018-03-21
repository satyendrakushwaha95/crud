
@extends('layouts.app')
@section('content')

<div class="container">
    <h1> Blogs 
<a class="btn btn-success" href="{{url('/blogs/create')}}">
                                    Add New Blog
                                </a> <a href="{{ URL::route('data/download/blogs') }}" class="btn btn-sm-+ btn-default pull-right"><i class="fa fa-download" aria-hidden="true"></i></a> 
                                <a href="{{ url('/download') }}" class="btn btn-sm-+ btn-default pull-right"><i class="fa fa-download" aria-hidden="true"></i>(WC)</a>
 </h1>
 <form class="form-inline" method="get" action="{{ url('/blogs') }}">
    <div class="form-group"><strong><span style="font-style: bold ;font-size:20px">Filter: </span></strong>
      <input type="number" class="form-control" id="id" placeholder="Enter ID" name="searchid">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="searchtitle">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="body" placeholder="Enter Body Elements" name="searchbody">
    </div>
    <button type="submit" class="btn btn-success">Search</button> <a class="btn btn-danger" href="{{url('blogs')}}">Reset</a> 
  </form></div>

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
<th>Content </th>
<th>File </th>
<th>Article</th>
<th>Time </th>
<th>Action</th>
</tr>
@foreach($blogs as $blog)
<tr class="info">
<td>{{ $blog->id }}</td>
<!-- <td><a href="{{ action('BlogsController@show',[$blog->id]) }}"> {{ $blog->title }} </a> </td> -->
<td>{{ $blog->title }}</td>
<td>{{ $blog->content}}</td>
<!-- <td>{{ $blog->file}}</td> -->
<td><a target="_blank" href="{{ URL::asset("storage/{$blog->file}") }}">{{ $blog->file }}</a></td>


<td>
@foreach($blog->hasArticle as $k=>$v)

{{$v->title}}<br>

@endforeach
</td>



<td>{{$blog->created_at}}</td>
<td><a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
<a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">View</a>
{!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
</td>
</tr>
@endforeach

</table>
<?php echo $blogs->render(); ?>

@endsection



