@extends('layouts.app')
@section('content')


<h1> About Page</h1>


<h3> Here I want to display the array I passed into about's controller section</h3>
<ul>
	@foreach ($people as $person)
		<li>{{$person}}</li>
	@endforeach
</ul>







@endsection