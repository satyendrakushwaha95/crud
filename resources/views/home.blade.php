
@extends('layouts.app')
@section('content')

<div class="row">
 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
</div>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel-header" style="text-align: center;">
        <div class="heading">
    <h2>Dashboard</h2>
  </div>
    </div>
                  <div class="card-body">
                    <span class="border border-info">
                    <div class="col-md-12 filter-block" id="filterDiv">
                        <input type="text" class="form-control input-sm" id="userTableFilter" data-action="filter" data-filters="#userTable" placeholder="Enter Name" />
                    
                    </div>
                     <table class="table table-hover table-responsive-sm" id="userTable"">
                      <thead>
                        <tr class="info">
                          <th>Name 
                            <i class="fa fa-search" aria-hidden="true" onclick="myFunction()"></i>
                          </th>
                          <th>Email</th>
                          <th>Date registered</th>
                          <th>Role</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody id="userTableBody">

                        @foreach($user as $user)
                        <tr>

                          <td>{{$user->name}}</td>
                          <td>{{$user->email}} </td>
                          <td>{{$user->created_at}}</td>
                            <td>

                                <?php
                                    if($user->role != null ){
                                        echo 'Admin'; }
                                    else echo 'Member';
                                ?>
                                             
                            </td>

                          <td>
                                <?php
                                    if($user->role != null ){
                                        echo "<span class='label label-danger'>"."Active"."</span>" ;}
                                    else echo "<span class='label label-success'>"."Active"."</span>" ;;
                                ?>
                          </td>
                        </tr>
                         @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
      </div>


 
<script>
$("#filterDiv").hide();

function myFunction() {
    var x = document.getElementById("filterDiv");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

$(document).ready(function(){
  $("#userTableFilter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#userTableBody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection
