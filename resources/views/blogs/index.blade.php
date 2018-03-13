
@extends('layouts.app')
@section('content')

<h1> Blogs 
<a class="btn btn-success" href="{{url('/blogs/create')}}">
                                    Add New Blog
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
<th>Content </th>
<th>File </th>
<th>Time </th>
<th>Action</th>
</tr>
@foreach($blogs as $blog)
<tr class="info">
<td>{{ $blog->id }}</td>
<td><a href="{{ action('BlogsController@show',[$blog->id]) }}"> {{ $blog->title }} </a> </td>
<td>{{ $blog->content}}</td>
<td>{{ $blog->file}}</td>
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



