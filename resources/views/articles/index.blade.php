
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
{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
</td>
<td>
<!--<a href="{{action('ArticlesController@show',[$article->id])}}" class="btn btn-info">View</a>
-->
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$article->id}}">View</button>

<!-- Modal -->
<div id="myModal{{$article->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
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


<!-- modal implementing -->
</td>
</tr>
@endforeach

</table>
<?php echo $articles->render(); ?>





@endsection



