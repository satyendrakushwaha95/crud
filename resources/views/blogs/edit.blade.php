@extends('layouts.app')
@section('content')
<div class="container paddingCont">
<div class="col-md-8 col-md-offset-2">
<!-- <form method="post" enctype="multipart/form-data" action="{{ url('BlogsController@update') }}" accept-charset="UTF-8"> -->
{!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update', $blog->id]]) !!} 
<div class="form-group">

{!! Form::label('title', 'Title') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->
<div class="form-group">
{!! Form::label('content', 'Content') !!}
<!-- {!! Form::textarea('content', null, ['class'=>'form-control']) !!} -->
<textarea name="content" class="form-control">{{ $blog->content }}</textarea>
<script>CKEDITOR.replace( 'content' );</script>
</div>

<div class="row">
<div class="col-md-5">
 <div class="form-group"><strong>To upload</strong>
<!-- {!! Form::file('file') !!}--> 
{!! Form::file('file[]', array('multiple'=>true, 'class' => 'image')) !!}
<!-- {!! Form::file('file', array('class' => 'image')) !!} -->
@foreach($blog->hasFile as $k=>$v)
File: <a target="_blank" href="{{ URL::asset("storage/uploads/{$v->file}") }}">{{ $v->file }}</a>
@endforeach
</div>
</div>
<div class="col-md-6">
<p><strong>Select Articles</strong></p>
<div class="form-group">
	
<select class="multiselect articleMultiselect" multiple="true" id="multi" name="article[]" style="width:410px;" >
	
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
</div>

 <!-- submit button -->
<div class="col-md-12">
<div class="form-group">
 <button type="submit" class="btn btn-sm btn-success" >Update</button>
 <a class="btn btn-sm pull-right btn-danger" href="{{url('blogs')}}">Reset</a>  
</div>
</div>
{!! Form::close() !!}
</div>
</div>
<script>
$(function() {
     $(".articleMultiselect").chosen();
});

</script>
@include('errors.list')
@endsection