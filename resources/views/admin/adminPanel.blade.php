@extends('layouts.app')
@section('content')
<style>


</style>
<div class="container">
<div class="heading">
<h2 style="font-family: 'Vast Shadow', cursive;">Admin Panel</h2>
</div>
  <table class="table table-hover table-responsive table-bordered">
    <thead>
      <tr style="background: #484848; color:#fff;">
        <th>Managing Rights For</th>
        <th class="textInMiddle">Read</th>
        <th class="textInMiddle">Write</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($user as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td><input type="checkbox" name=" " value="checked" /></td>
        <td><input type="checkbox" name=" "  /></td>
      </tr>
 		@endforeach
    
    </tbody>
  </table>


</div>






















@endsection