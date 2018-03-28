@extends('layouts.app')
@section('content')

<div class="panel-body">
<h1> Profile Page </h1>
<div class="container">
<h1>{{ $user->name }}</h1>
<p> Email: {{ $user->email }} </p>
   	<div class="floatLeft">
<table class="table"> 
<tr class="danger">
<th>On location </th>
</tr>
 @foreach($location as $loc)
<tr class="info">
	<td>
{{$loc->location}}<br> 	
</td>
@endforeach
</tr>
</table>
</div>

   	<div class="floatRight">
<table class="table"> 
<tr class="danger">
<th>With Salary </th>
</tr>
@foreach($salary as $sal)
<tr class="info">
<td>
{{$sal->salary}}<br>
</td>
@endforeach
</tr>
</table>
</div>
</div> 
</div>

@endsection