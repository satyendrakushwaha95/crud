@extends('layouts.app')
@section('content')
<div class="container">
<div class="heading">
<h2 style="font-family: 'Vast Shadow', cursive;">Admin Panel</h2>
</div>
  <table class="table table-hover table-responsive table-bordered">
    <thead>
      <tr style="background: #484848; color:#fff;">
        <th class="textInMiddle">Managing Rights For</th>
        <th class="textInMiddle">Read</th>
        <th class="textInMiddle">Write</th>
      </tr>
    </thead>
    <tbody class="textInMiddle">
      <tr >
        <td >Article</td>
        <td><input type="checkbox" name=" " value="checked" /></td>
        <td><input type="checkbox" name=" "  /></td>
      </tr>
      <tr>
        <td>Blog</td>
        <td><input type="checkbox" name=" " value="checked" /></td>
        <td><input type="checkbox" name=" "  /></td>
      </tr>
    
    </tbody>
  </table>
</div>

@endsection
