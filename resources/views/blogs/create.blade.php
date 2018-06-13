@extends('layouts.app')
@section('content')

<div class="container paddingCont">
<div class="col-md-8 col-md-offset-2">
{!! Form::open( [ 'url' => 'blogs', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => true ] ) !!}

<!-- {!! Form::open(array('url'=>'blogs', 'files'=>'true')) !!}  -->

<!-- Name field -->

<div class="form-group">

{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->

<div class="form-group">

{!! Form::label('content', 'Content:') !!}
<textarea name="content" class="form-control"></textarea>
<script>CKEDITOR.replace( 'content' );</script>
</div>
<div class="row">
<div class="col-md-5">
 <div class="form-group"><strong>To upload</strong>
{!! Form::label('file', 'Choose file to upload:') !!}
<!-- {!! Form::file('file') !!}--> 
{!! Form::file('file[]', array('multiple'=>true, 'class' => 'image')) !!}
<!-- {!! Form::file('file', array('class' => 'image')) !!} -->
</div> 
</div>

<div class="col-md-6">
<strong>Select Articles</strong>
<div class="form-group">
<select class="multiselect articleMultiselect" multiple="true" id="multi" name="article[]" style="width:400px">
	@foreach($articles as $key => $article)
        <option value="{{$article->id}}">{{$article->title}}</option>
        @endforeach
</select>
</div>
</div>
</div>
 <!-- submit button -->
<div class="col-md-12">
<div class="form-group">
{!! Form::submit ('Add Blog', ['class'=> 'btn btn-sm btn-primary from-control']) !!}
<a class="btn btn-sm  pull-right btn-danger" href="{{url('blogs')}}">Back</a>
</div>
</div>

{!! Form::close() !!}
@include('errors.list')
</div>
</div>
<script>
$(function() {
     $(".articleMultiselect").chosen();
});
</script>

@endsection
