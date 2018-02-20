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

 <!-- submit button -->

<div class="form-group">
{!! Form::submit ($submitButtonText, ['class'=> 'btn btn-primary from-control']) !!}
</div>


