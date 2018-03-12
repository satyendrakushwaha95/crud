
@extends('layouts.app')
@section('content')

<div class="container"><p><span style="font-style: bold ;font-size:35px">Articles</span>
<button type="button" class="btn btn-info btn-primary" data-toggle="modal" data-target="#addModal">Add Article</button></p>

<!-- ---------------------------------------------------------------------------------- -->

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
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$article->id}}"><i class="fa fa-eye" aria-hidden="true">View</i></button>
<button type="button" class="btn btn-info btn-primary editArticle" data-id="{{$article->id}}" data-toggle="modal" data-target="#editModal">Edit</button>

<td>
{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

 <!-- ----------------------------- A D D --------------------------------------- --> 

 <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Article</h4>
        </div>
        <div class="modal-body modalContent">       

<form id="addArticle" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
 
<div class="form-group">
<div class="col-sm-12">
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div></div>
<div class="form-group">
<div class="col-sm-12">
{!! Form::label('body', 'Body:') !!}
{!! Form::text('body', null, ['class'=>'form-control']) !!}
</div></div>
</div> <!--modal body closing -->
        <div class="modal-footer"> 
          <button type="button" id="submit" class="btn btn-success submitForm">Submit</button>  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>    
    </div>
  </div>

 <!-- ----------------------------- E D I T --------------------------------------- --> 
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Article</h4>
        </div>
       <!--  <div class="modal-body modalContent">  -->      
<div class="modal-body"> 
<form id="updateModal" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">

<div class="form-group"> 
        <input id="idval" name="id" type="hidden" value="{{ $article->id }}">
</div> 
<div class="form-group">
<div class="col-sm-12">

        <label for="title">Title:</label>
        <input type="text" id="titleval" name="title" value="{{ $article->title }}">
      </div></div>
<div class="form-group">
<div class="col-sm-12">
        <label for="body">Body:</label>
        <input type="text" id="bodyval" name="body" value="{{ $article->body }}">
      </div></div>

</div> 
         <div class="modal-footer"> 
          <button type="button" class="btn btn-success updateForm">Update</button>  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>    
    </div>
  </div>


  <!-- ----------------------------------- V I E W -------------------------------------- --> 

<div id="myModal{{$article->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Title: {{$article->title}}</h4>
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
  
  <!-- ----------------------------- S C R I P T S ------------------------------------ -->
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
             // alert(data.success);

              window.location.href = "{{url('articles')}}";

           }
        });
  });

 

 $(".editArticle").click(function(){
       $.ajax({
            type: 'POST',
            url: '{{route("edit")}}',
            data: {id:$(this).attr('data-id')},
            
            success: function(response) {
               $('.modalContent').html(response);
             }
        });
    });


  
  $(".updateForm").on('click', function(){
        $.ajax({
            type: 'POST',
            url: '{{route("updateData")}}',
            data: {
                'id': $('#idval').val(),
                'title': $('#titleval').val(),
                'body': $('#bodyval').val()
            },
            success: function(data) {
                
                window.location.href = "{{url('articles')}}";
            }
        });
    });
});




</script>


</div>
@endsection

