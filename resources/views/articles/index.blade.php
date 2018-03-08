
@extends('layouts.app')
@section('content')

<h1> Articles 
<a class="btn btn-success" href="{{url('/articles/create')}}">
                                    Add New Article
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
<th>Body </th>
<th>Time </th>
<th>Action</th>
</tr>
@foreach($articles as $article)
<tr class="info">
<td>{{ $article->id }}</td>
<td>{{ $article->title }} </td>
<td>{{ $article->body}}</td>
<td>{{$article->created_at}}</td>
<!-- modal implementing -->
<td>
<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
<td>{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
<!-- Trigger the modal with a button -->
<td><button type="button" class="btn btn-info btn-primary" data-toggle="modal" data-target="#myModal{{$article->id}}">View</button>

<div id="myModal{{$article->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Title: {{$article->id}}</h4>
      </div>
      <div class="modal-body">
        Body: {{$article->body}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</td>
</tr>
@endforeach

</table>
<?php echo $articles->render(); ?>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addModal">Add Article</button>
  
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Article</h4>
        </div>
        <div class="modal-body">
          

<form id="addArticle" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
<div class="form-group">
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('body', 'Body:') !!}
{!! Form::text('body', null, ['class'=>'form-control']) !!}
</div>

        </div> <!--modal body closing -->
        <div class="modal-footer">     
          <button type="button" id="submit" class="btn btn-info submitForm">Submit</button>         
          <button type="button" id="reset" class="btn btn-danger">Clear</button>
        </div>
</form>
      </div>    
    </div>
  </div>
  
<script>

  $(document).ready(function(){
  $(".submitForm").click(function(){
  //alert("checking");
        
        var title = $("input[name=title]").val();

        var body = $("input[name=body]").val();

        
        $.ajax({

           type:'POST',

           url:'{{route("addArticle")}}',

           data:{title:title, body:body},

           success:function(data){

              alert(data.success);

           }

        });

  });

  });

</script>

</div>
@endsection



