<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;
use App\Models\Task;
use App\Models\User;
use Auth;
class TaskController extends Controller
{
    

       public function add(Request $request)
       {
               $task =  Task::create([
                
                             'user_id'=> $request->user_id,
                             'task'=>$request->task,
                          
                          ]);

            return response(['task'=> new TaskResource($task),'status'=>1,'message'=>'successfully created a task',201]);
       }

       public function status(Request $request, Task $task)
       {
            $task = Task::where(['id'=>$request->task_id,'user_id'=>Auth::id()])->first();
            $task->status = $request->status;
            if($task->save()){
              
                 return ['message'=>'done', 'task'=> new TaskResource($task)];
            
            }else{
                 
                 return ['message'=>'pending','task'=> new TaskResource($task)];
            }

       }
}
