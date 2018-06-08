@extends('layouts.app')
@section('content')

  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
    position: absolute;
    cursor: pointer;
    top: 12px;
    left: 7px;
    right: 5px;
    bottom: 0px;
    background-color: #797979;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 13px;
    width: 13px;
    left: 5px;
    bottom: 5px;
    background-color: #ffffff;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
  background-color: #00a003;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

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
        <td>
            <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
            </label>
        </td>
        <td>
            <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
            </label>
        </td>
      </tr>
      <tr>
        <td>Blog</td>
        <td>
            <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
            </label>
        </td>
        <td>
            <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
            </label>
        </td>
      </tr>
    
    </tbody>
  </table>
</div>

@endsection
