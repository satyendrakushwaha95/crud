@extends('layouts.app')
@section('content')


<div class="container">
<h3>Edit: {!! $blog->title !!}</h3><a class="btn btn-danger" href="{{url('blogs')}}">Back</a>
<hr/>
<!-- <form method="post" enctype="multipart/form-data" action="{{ url('BlogsController@update') }}" accept-charset="UTF-8"> -->
{!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update', $blog->id]]) !!} 
<div class="form-group">

{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->

<div class="form-group">

{!! Form::label('content', 'Content:') !!}
{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>

 <div class="form-group">
{!! Form::label('file', 'Choose file to upload:') !!}
<!-- {!! Form::file('file') !!}--> 
{!! Form::file('file[]', array('multiple'=>true, 'class' => 'image')) !!}
<!-- {!! Form::file('file', array('class' => 'image')) !!} -->
File:<a target="_blank" href="{{ URL::asset("storage/uploads/{$blog->file}") }}">{{ $blog->file }}</a><br>


<div class="form-group">
	<strong>Articles: </strong>
	<?php  //print_r($blog->blogArticle); die;?>
<select class="multiselect articleMultiselect" multiple="true" id="multi" name="article[]" style="width:400px">
	
	@foreach($articles as $key => $article)
	@if($blog->blogArticle)
	<?php $selected='';?>
	@foreach($blog->blogArticle as $k=>$v)
    @if($article->id==$v->article_id)
    <?php $selected="selected";?>
    @endif
	@endforeach
	@endif
        <option {{ $selected}} value="{{$article->id}}">{{$article->title}}</option>
        @endforeach
</select>
</div>
</div> 

 <!-- submit button -->

<div class="form-group">
 <button type="submit" class="btn btn-success">Update</button>  
</div>
</div>
{!! Form::close() !!}

<script>
$(function() {
     $(".articleMultiselect").chosen();
});
</script>
@include('errors.list')
@endsection