@extends('layouts.app')
@section('content')

<h1> Write your Articles </h1>
<hr/>

{!! Form::open(['url'=>'articles']) !!} 

<!-- Name field -->
<div class="form-group">

{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<!-- body form input -->

<div class="form-group">

{!! Form::label('body', 'Body:') !!}
{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

 <!-- submit button -->

<div class="form-group">
{!! Form::submit ('Add Article', ['class'=> 'btn btn-primary from-control']) !!}
</div>


</div>
{!! Form::close() !!}

@endsection
