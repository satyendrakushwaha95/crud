<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    border: 1px solid #ddd;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
}
</style>
@extends('layouts.app')
@section('content')

<h1>Blog</h1>


<table>
<tr>
<th>ID</th>
<th>Name </th>
<th>Content </th>
</tr>
@foreach($blogs as $blog)
<tr>
<td>{{ $blog->id }}</td>
<td>{{ $blog->title }} </td>


<td>{{ $blog->content}}</td>
</tr>
@endforeach
</table>





@endsection