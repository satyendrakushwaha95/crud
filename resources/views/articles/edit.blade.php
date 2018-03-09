<!-- @extends('layouts.app')
@section('content')

<h3>Edit: {!! $article->title !!} <a href="{{url('articles')}}" class="btn btn-info" role="button">Back</a></h3> </hr>

{!! Form::model($article,['method'=>'PATCH','action'=>['ArticlesController@update', $article->id]]) !!} 

@include('articles.form',['submitButtonText'=>'Update Article'])


{!! Form::close() !!}

@include('errors.list')

@endsection -->

<form id="updateArticle" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
 
<div class="form-group">
<div class="col-sm-12">
{!! Form::label('title', 'Edit Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div></div>
<div class="form-group">
<div class="col-sm-12">
{!! Form::label('body', 'Edit Body:') !!}
{!! Form::text('body', null, ['class'=>'form-control']) !!}
</div></div>
</div> <!--modal body closing -->
        <div class="modal-footer"> 
          <button type="button" id="submit" class="btn btn-success submitForm">Update</button>  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>