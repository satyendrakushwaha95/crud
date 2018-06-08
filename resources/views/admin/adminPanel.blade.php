@extends('layouts.app')
@section('content')
<style>
  .btn{
    border-radius: 50% !important;margin: 0 5px;
  }
</style>
<div class="container">
<div class="heading">
<h2 style="font-family: 'Vast Shadow', cursive;">Admin Panel</h2>
</div>
  <table class="table table-hover table-responsive table-bordered textInMiddle">
    <thead>
      <tr style="background: #484848; color:#fff;">
        <th class="textInMiddle">Managing Rights For</th>
        <th class="textInMiddle">Status</th>
        <th class="textInMiddle">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Admin</td>
        <th class="textInMiddle"><span class="label label-success">Active</span></th>
        <td><a class="btn btn-xs btn-primary" href="{{url('adminPanelEdit')}}"> Edit </a></td>
      </tr>
      <tr>
        <td>User</td>
        <th class="textInMiddle"><span class='label label-success'>Active</span></th>
        <td><a class="btn btn-xs btn-primary" href="{{url('adminPanelEdit')}}"> Edit </a></td>
      </tr>
    
    </tbody>
  </table>
</div>

@endsection