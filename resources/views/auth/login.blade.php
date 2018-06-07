<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<title>Login</title>
<style>
 
  html,body {
  height:100%;
}
	body {
  /* Location of the image */
  background-image: url(images/background-photo.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color:#464646;
}

/* For mobile devices */
@media only screen and (max-width: 767px) {
 
  body {
    background-image: url(images/background-photo-mobile-devices.jpg);
  }
  }

    .panel{
    display: inline-block;
    position: fixed;
    top: 5px;
    bottom: 5px;
    left: 5px;
    right: 5px;
    width: 400px;
    height: 370px;
    margin: auto;
    align-self: auto|stretch|center|flex-start|flex-end|baseline|initial|inherit;
    }

  .panel-heading{
    border-radius: 10px 10px 0 0;
    min-height: 100px;
    background-color: rgba(230, 230, 230, 0.58);
  }
  .panel-body{
    background-color: rgba(230, 230, 230, 0.58);

  }
  .panel-footer{
    border-radius: 0 0 10px 10px;
    min-height: 40px;
    background-color: rgba(3, 165, 202, 0.75);
    color: white;
    text-align: center;
  }

  .panel-footer a {
    color: white;
  }

  .panel-footer a:hover{
    color: black;
  }

.container, .row {
  height:100%;
}

.flex-row, .flex-row > div[class*='col-'] {  
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex:0 auto;
    height:100%;
}

.flex-col {
    display: flex;
    display: -webkit-flex;
    flex: 1;
    flex-flow: column nowrap;
    height:60%;
}

.flex-grow {
  display: flex;
    -webkit-flex: 2;
    flex: 2;
}

form{
  padding-top: 20px;
  }

.loginbtn {
    display: block;
    width: 100%;
    border: none;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
}

.loginbtn:hover {
    background-color: rgb(209, 41, 69);
    color: black;
}

.logotext{
  color: white;
  text-transform: uppercase;
  text-shadow: 2px 2px 4px #000000;
  letter-spacing: 2px;
}
</style>
</head>
<body>

  <div class="container">
  <div class="row flex-row">
    
    <div class="col-md-12">
      <div class="panel panel-default flex-col">
        <div class="panel-heading">
          <img src="images/logo.png" height="100px" width="150px">
          <span class="logotext">
            Project-3
          </span>
        </div>
       <div class="panel-body flex-grow">
        <div class="form col-md-12">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
           <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="checkbox">
           <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
          </div>
          <button type="submit" class="btn loginbtn">Submit</button>
        </form>
      </div>
       </div>

      <div class="panel-footer">
       <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
      </div>
       </div>
    </div>  
    
  </div>
</div>


</body>
</html>