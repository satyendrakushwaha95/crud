
@extends('layouts.app')
@section('content')

<div class="container"><p><span style="font-style: bold ;font-size:35px">Articles</span>

<!-- <a class="btn btn-success" href="{{url('/articles/create')}}">Add New Article</a> -->
  <button type="button" class="btn btn-info btn-primary" data-toggle="modal" data-target="#addModal">Add Article</button>
  
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Article</h4>
        </div>
        <div class="modal-body">       

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
</p>
   <!-- for message -->
    @if ($message = Session::get('success'))
       <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif

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
<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
<td>{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
 <!-- ---------------------------------------------------------------------------------- --> 
 <!-- Edit modal -->

<button type="button" class="btn btn-info btn-primary" data-toggle="modal" data-target="#editModal">Edit</button>
  
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Article</h4>
        </div>
       <!--  <div class="modal-body modalContent">  -->      
<div class="modal-body modalContent"> 
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
      </div>    
    </div>
  </div>


  <!-- End of edit modal-->
  <!-- ---------------------------------------------------------------------------------- --> <!-- View modal -->
<td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$article->id}}"><i class="fa fa-eye" aria-hidden="true">View</i></button>

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
<!-- ---------------------------------------------------------------------------------- -->
</td>
</tr>
@endforeach

</table>
<?php echo $articles->render(); ?>
  
  <!-- ---------------------------------------------------------------------------------- -->
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
  });

</script>

</div>
@endsection

