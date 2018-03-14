@extends('layouts.app')
@section('content')

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


 <!-- submit button -->

<div class="form-group">
{!! Form::submit ('Add Blog', ['class'=> 'btn btn-primary from-control']) !!}
</div>


</div>
{!! Form::close() !!}
@include('errors.list')

@endsection
