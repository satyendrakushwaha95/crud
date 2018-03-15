@extends('layouts.app')
@section('content')

<div class="container">
<h1> Write your Blogs </h1>
<hr/>

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
{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>

 <div class="form-group">
{!! Form::label('file', 'Choose file to upload:') !!}
<!-- {!! Form::file('file') !!}--> 
{!! Form::file('file', array('class' => 'image')) !!}

</div> 

 <strong>Select to add articles </strong>
 <div class="form-group">

<!-- <select id="multi" name="article" multiple>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select> -->

<select class="multiselect" multiple="true" name="article[]" style="width:200px;">
	@foreach($articles as $key => $article)
        <option value="{{$article->id}}">{{$article->title}}</option>
        @endforeach
</select>
</div>

 <!-- submit button -->

<div class="form-group">
{!! Form::submit ('Add Blog', ['class'=> 'btn btn-primary from-control']) !!}
</div>


</div>
{!! Form::close() !!}
@include('errors.list')
</div>
<script>
$(function() {
    $(".multiselect").chosen();
});
</script>
@endsection
