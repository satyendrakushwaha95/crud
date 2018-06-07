
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="heading">
    <h2 style="font-family: 'Vast Shadow', cursive;">Articles</h2>
  </div>
<div class="col-md-12 filter-block">
<div class="col-md-2">
<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addModal">Add Article</button>
</div>
<!-- ----------------------------- SEARCH FILTER ----------------------------------- --> 
<div class="col-md-8">
  <form class="form-inline" method="get" action="{{ url('/articles') }}">
    <div class="form-group"><strong><span style=" ;font-size:16px">Filter </span></strong>
      <input type="number" class="form-control input-sm" id="id" placeholder="Enter ID" name="searchid">
    </div>
    <div class="form-group">
      <input type="text" class="form-control input-sm" id="title" placeholder="Enter Title" name="searchtitle">
    </div>
    <div class="form-group">
      <input type="text" class="form-control input-sm" id="body" placeholder="Enter Body Elements" name="searchbody">
    </div>
    <button type="submit" class="btn btn-sm btn-success">Search</button>
    <a class="btn btn-sm btn-danger" href="{{url('articles')}}">Reset</a>
</div>

    <div class="col-md-2">
    <a href="{{ URL::route('data/download/articles') }}" class="btn btn-sm btn-default"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
  </div>
  
  </form>
</div>
</div>
 
 <!-- ----------------------------- A D D --------------------------------------- --> 

 <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Add Article</strong></h4>
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
{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div></div>
</div> <!--modal body closing -->
        <div class="modal-footer"> 
          <button type="button" id="submit" class="btn btn-xs btn-success submitForm">Submit</button>  
          <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>    
    </div>
  </div>
</div>

<!-- ---------------------------------------------------------------------------------- -->

<div class="container" >
<table class="table table-responsive table-hover table-bordered"> 
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
<td>{{ str_limit($article->body)}}</td>
<td>{{$article->created_at}}</td>
<!-- modal implementing -->
<td style='white-space: nowrap' >
<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal{{$article->id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
<button type="button" class="btn btn-xs btn-warning editArticle" data-id="{{$article->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
</td>
</tr>

<!-- 
{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete Normal', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!} -->


 <!-- ----------------------------- E D I T --------------------------------------- --> 
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Edit Article</strong></h4>
        </div>
       <!--  <div class="modal-body modalContent">  -->      
<div class="modal-body"> 
  <form id="updateModal" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
      <input id="idval" name="id" type="hidden" value="{{ $article->id }}">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="titleval" class="form-control" name="title" value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <input type="textarea" id="bodyval" class="form-control" name="body" value="{{ $article->body }}">
        </div>

</div> 
        <div class="modal-footer"> 
          <button type="button" class="btn btn-success btn-xs updateForm">Update</button>  
          <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Close</button>
        </div>
  </form>
      </div>    
    </div>
  </div>
</div>
 <!-- ----------------------------------- D E L E T E -------------------------------------- -->

<div class="modal fade{{$article->id}}" id="deleteModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <div class="container">
            <div class="col-md-2" style="margin-left: 38px;">  
               <form id="deleteModal" enctype="multipart/form-data" class="form-horizontal" role="form" method="get">    
                     <input id="deleteId" name="id" type="hidden" value="{{ $article->id }}">
                      <h4>Are you sure.??</h4>
                        <button type="button" class="btn btn-sm btn-danger deleteData">Delete</button>  
                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Close</button>
              </form>
              </div> 
            </div>
          </div>  
      </div>
    </div>
</div>

  <!-- ----------------------------------- V I E W -------------------------------------- --> 

<div id="myModal{{$article->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-title"><strong>{{$article->title}}</strong></div>
      </div>
      <div class="modal-body">
      {{$article->body}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</td>
</tr>
@endforeach

</table>
<div class="col-md-18 pull-right">
<?php echo $articles->render(); ?>
</div>
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

$(".deleteData").on('click', function(){
        var id=$("#deleteId").val();
        $.ajax({
         
            //type: 'POST',
            url: '{{route("deleteData")}}',
            type: 'GET',
            data: {id:id
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

