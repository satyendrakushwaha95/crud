@extends('layouts.app')
@section('content')
<style>

	html, body { 
  		height: 100%;
  		overflow-x: hidden;
	}

	col-md-3 col-md-6{
		min-height: 300px;
		margin-bottom: 20px;
	}

	.div1{
		margin-left: 20px;
	}
	.div3{
		margin-right: 20px;
	}
	.header{
		padding: 10px;
		background-color: gray;
		border-radius: 10px 10px 0 0 ;
		color: white;
	}
	.body{
		background-color: #e4e4e4; 
		height: calc(100vh - 300px);
  		overflow-y: auto;
  		flex: 1 1 auto;
	}
	.btn{
		margin:5px 5px 5px 5px;  
	}
</style>

<div class="row">
	<div class="col-md-3">
	<div class="custDiv div1">
		<div class="header">
				Header
		</div>
		<div class="body div1body">
				Body
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="custDiv">
		<div class="header">
				Header
		</div>
		<div class="body">
				Body
		</div>
	</div>
	</div>
	<div class="col-md-3">
	<div class="custDiv div3">
		<div class="header">
				Header
		</div>
		<div class="body">
				Body
		</div>
	</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
	<div class="custDiv div1">
		<div class="header">
				Header
		</div>
		<div class="body">
			
				<div class="btn btn-sm btn-info pull-left">
					Left
				</div>
				<div class="btn btn-sm btn-success pull-right">
					Right
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="custDiv div3">
		<div class="header">
				Header
		</div>
		<div class="body">
				Body
		</div>
	</div>
	</div>
</div>





@endsection