
<form id="deleteModal" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
 
{!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
                     <div class="modal-footer"> 
          <button type="button" class="btn btn-success updateForm">Update</button>  
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
   {!! Form::close() !!}




 <script>
 $(document).ready(function(){
 $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                
            }
        });
    });
});
 </script>