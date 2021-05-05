@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
              @if (session('status'))
                        <div class="alert alert-success alert-dismissable" role="alert">
                            {{ session('status') }}<button class="close" data-dismiss="alert">&times;</button>
                        </div>
              @endif
            <div class="card">
                <div class="card-header">
                {{ __('Dashboard') }}<strong class="float-right">Hello, {{Auth::user()->name}}</strong></div>

                <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-2">
                      
                        @include('sidebar')
                    </div>
                    <div class="col-sm-10">

                        @include('tasklist')
                        @include('addtask')
                        @include('updatetask')
                        
                    </div>
                </div>                  




                </div>
         
          </div>
           
         

          


        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    
  function confrimDelete(id)
  {

    let choice = confirm('Are you really want to remove task');

    if(choice)
    {
          
      document.getElementById('delete-task-'+id).submit();
    }
 

  }
 
  $(document).ready(function(){

  $('#addtask').on("click",function(){
   
   var task = $('#task').val();
   var user_id = $('#user_id').val();
   var api_token = $('#api_token').val();

   if(task  == '' || task == null)
   {
      document.getElementById('taskerror').innerHTML = "<strong class='text-danger'>* Please Add task</strong>";
   }

 

    $.ajax({
        url:"http://localhost:8080/example-app/public/api/todo/add",
        method:"POST",
       
        data:{task:task,
              user_id:user_id,
             },
        headers:{
          'Authorization':'Bearer '+ api_token,
        },
        success:function(data)
        {
             /* $('#alert').html("task has been added successfully" + "<button class='close' data-dismiss='alert'>&times;</button>");
              $('#alert').show();*/
              $('#task').val(null);
              alert('Task has been added successfully in your tasklist');
        },
    
        error:function(result){
            
              $('#alert').html("Error:" + "<button class='close' data-dismiss='alert'>&times;</button>");
              $('#alert').show();

        },



      });
  

  });


    /*update task*/

    $('#updatetask').on("click",function(){
   
   var task = $('#task').val();
   var task_id = $('#task_id').val();
   var user_id = $('#user_id').val();
   var api_token = $('#api_token').val();
   var task_status = $('#task_status').val();

   if(task  == '' || task == null)
   {
      document.getElementById('taskerror').innerHTML = "<strong class='text-danger'>* Please Add task</strong>";
   }

 

    $.ajax({
        url:"http://localhost:8080/example-app/public/api/todo/status",
        method:"POST",
       
        data:{task:task,
              task_id:task_id,
              task_status:task_status,
              user_id:user_id,
             },
        headers:{
              'Authorization':'Bearer '+ api_token,

        },
        success:function(data)
        {
              alert('Task has been updated successfully');

              window.location.href = "http://localhost:8080/example-app/public/home";
        },
    
        error:function(result){
            
              $('#alert').html("Invalid Api key or Token" + "<button class='close' data-dismiss='alert'>&times;</button>");
              $('#alert').show();
             

        },



      });
  

  });
   
    /*end update task*/
  });
</script>
@endsection