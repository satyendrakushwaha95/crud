<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Satyendra Kushwaha">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Design 1</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
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


.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: flex;
   	flex-direction: column;

 }

.panel {
  border: 1px solid transparent;
   padding: 2px;
   border-radius:8px;
   box-shadow:
        inset 0 0 50px #fff,      /* inner white */
        inset 5px 0 50px #f0f,   /* inner left magenta short */
        inset -5px 0 50px #0ff,  /* inner right cyan short */
        inset 5px 0 50px #f0f,  /* inner left magenta broad */
        inset -5px 0 50px #0ff, /* inner right cyan broad */
        0 0 10px #fff,            /* outer white */
        0px 0 10px #f0f,    /* outer left magenta */
        0px 0 10px #0ff;   /* outer right cyan */
}

.panel-default {
        border-color: #4e4e4e !important;
}

.panel-content{
	padding: 5px;
}

.panel-heading{
background-color: rgba(255, 255, 255, 0.4) !important;
height: 50px;
background-color: #ff4a4a !important;
	}

.panel-footer{
background-color: #ff4a4a !important;
height: 40px;
text-transform: uppercase;
	}
.panel-footer a{
color: rgba(255, 255, 255, 0.8) !important;
}

.panel-body{
background: white;
padding: 15px;
display: flex;
flex-direction: column;
	}
img{
	max-width: 85px;
	max-height: 85px;
	padding: 5px;
}

</style>
<body>


	<div class="container col-md-3  col-md-offset-9 col-xs-12">	
		<div class="panel panel-default">
			<div class="panel-content">
    		
    		<div class="panel-heading rounded-top text-center">
    			<img src="images/logo2.png">
    		</div>
    		<div class="panel-body ">
    			<div class="body-data">
    				<form>
    					<div class="form-group">
      						<label for="usr">Name:</label>
      						<input type="text" class="form-control" id="user">
    					</div>
    					<div class="form-group">
      						<label for="pwd">Password:</label>
      						<input type="password" class="form-control" id="password">
    					</div>
    					<div class="body-buttons"><center>
    					<button type="button" class="btn btn-outline-success">Sign In</button>
  						</center></div>
  					</form>
    			</div>
    		</div>
    		<div class="panel-footer rounded-bottom text-center">
    			<a href="#">FORGOT PASSWORD</a>
    		</div>
    	</div>
		</div>
	</div>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>