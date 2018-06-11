
@extends('layouts.app')
@section('content')
<style>

  .zindex{
    z-index: 999999;
    position: relative;
  }
</style>
    <div class="container zindex">
    <div class="col-md-8 col-md-offset-2 ">
    <div class="panel-header" style="text-align: center;">
        <div class="heading">
    <h2 style="font-family: 'Vast Shadow', cursive;">Dashboard</h2>
  </div>
    </div>
                  <div class="card-body">
                    <span class="border border-info">
                    <div class="col-md-12 filter-block" id="filterDiv">
                        <input type="text" class="form-control input-sm" id="userTableFilter" data-action="filter" data-filters="#userTable" placeholder="Enter Name" />
                    
                    </div>
                     <table class="table table-bordered table-responsive-sm" id="userTable"">
                      <thead>
                        <tr style="background: #484848; color:#fff;">
                          <th>User 
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
                        <tr >

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

            <div id="particles-js"></div>
            <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            <script>
                particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
                    console.log('callback - particles.js config loaded');
                });
            </script>
 
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
