
@extends('layouts.app')
@section('content')

<div class="container">
<select id="article" name="select">
<h1>Git testing </h1>

	@foreach($article as $art)
 	<option value="{{$art->id}}">{{$art->title}}</option>
 	@endforeach 


</select>
</div>
<script>

	$(document).ready(function(){
	$("#article").change(function(){

		var id=$(this).find('option:selected').val();
      alert(id);
   
   	$.ajax({
               type: "POST",
               url: "{{ route('articleview') }}",
               data: {id: id},
               //cache: false,
               success: function (response) {
               	//alert(response);
               	var ArticleData=JSON.parse(response);
               	alert(ArticleData);
                //console.log("CRUD"+JSON.stringify(response));
                alert(ArticleData.error)

				if(ArticleData.error=='success'){
				alert('Hi');
				}
 				
 				//alert("$id");
                   
                if (response.length > 0) {
                  // 

                   }

               }, error: function (e) {
                   // console.log(e.responseText);
               }
           });



    });
});
</script>
@endsection