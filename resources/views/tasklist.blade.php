@isset($task)
        <span class="float-left">Your Task Lists</span>
        <div class="table-responsive">
         <table class="table table-striped table-sm">
           <thead>
            <tr>
              <th>Task description</th>
              <th>Status</th>
              <th>Publish date</th>
              <th>Last Modified</th>
              <th>Action</th>
              
            </tr>
          </thead>
      
        @foreach($task as $tasklist)
            <tbody>
            <tr>
              <td>{{ $tasklist->task }}</td>
               <td>{{ $tasklist->status }}</td>
                <td>{{ $tasklist->created_at }}</td>
                 <td>{{ $tasklist->updated_at}}</td>
                
                  <td> <a href="{{route('edit-task-form',$tasklist->id)}}" class="btn btn-sm btn-outline-dark">UPDATE</a>
                 <a href="javascript:;" onclick="confrimDelete('{{$tasklist->id}}')" class="btn btn-sm btn-outline-danger">REMOVE</a>

                <form id="delete-task-{{$tasklist->id}}" action="{{ route('task-remove',$tasklist->id)}}" method="POST" style="display: none;">
                  @method('DELETE')
                  @csrf
                <!--  <input type="submit" name="submit" value="DELETE" onclick="confrimDelete()" class="btn btn-sm btn-danger">-->
                  
                </form></td>
            
            


              
            </tr>
           
          
          </tbody>
        

        @endforeach
        </table>


         <div class="row">
          
          <div class="col-md-12">
          <center>
             {{ $task->links()}}
           </center>
            
          </div>
          
        </div>


        @if($task->count() == 0)
            <div class="alert alert-secondary">
              <strong>You Have not added Any Task</strong>
            </div>
        @endif

        </div>





 @endisset
