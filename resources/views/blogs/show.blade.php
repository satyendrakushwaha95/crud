@extends('layouts.app')
@section('content')
<style>


</style>
<div class="container">
  <a class="btn btn-success" href="{{url('blogs')}}"> Back </a>
</div>

<div class="container">
<div class="col-md-6 col-md-offset-3 panel blogPanel">
<div class="panel-heading blogHeading">
{{$blog->title}}
</div>
<div class="panel-body blogBody">
<div class="row">
Content: {{ $blog->content }}
</div>
File:
@foreach($blog->hasFile as $k=>$v)
<a target="_blank" href="{{ URL::asset("storage/uploads{$v->file}") }}">
  <td>  {{ $v->file }}</td>
</a>
@endforeach

Article -> Title:h>
    @foreach($blog->hasArticle as $k=>$v)
    {{$v->title}}
@endforeach
</div>

<!-- <img src='{{ asset($blog->file) }}'> 

{{ Html::image('$blog->file') }} -->
</div>
</div>
</div>
@endsection