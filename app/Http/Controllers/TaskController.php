<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;
use Illuminate\Support\Facades\Session;

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
            $task = Task::where(['id'=>$request->task_id,'user_id'=>$request->user_id])->first();
            $task->status = $request->task_status;
            $task->task = $request->task;
            if($task->save()){
              
                 return ['message'=>'done', 'task'=> new TaskResource($task)];
            
            }else{
                 
                 return ['message'=>'pending','task'=> new TaskResource($task)];
            }

       }

       public function task_remove($id)
       {
            $status = Task::where('id',$id)->delete();

            if($status)
            {

               return redirect()->route('home')->with('status','Task removed successfully');
            }
            else
            {
               return redirect()->route('home')->with('status','Something went wrong please try later');


            }

       }

       public function add_task_form()
       {
           $token = Session::get('api_token');
          return view('home',['addtask'=>'addtask','token'=>$token]);
       }

       public function edit_task_form($id)
       {  
           $edit = Task::where(['id'=>$id,'user_id'=>Auth::id()])->first();
           $token = Session::get('api_token');

          return view('home',['edittask'=>$edit,'token'=>$token]);

       }
}
