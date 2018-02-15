@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"> Add Blog </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



<form class="form-horizontal" method="POST" action="(url">

Name : <input type="text" name="Name"><br><br>
Content : <input type="text" name="Content"><br>
<br>

<div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    Clear
                                </button>

                            
                            </div>
                        </div>

 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection