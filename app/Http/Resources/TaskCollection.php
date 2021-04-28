<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         $result  = array (

           'task_id'= $this->id,
           'user_id'= $this->user_id,
           'task_description' = $this->task,
           'task_status' =  $this->status == "done" ? 1 : 0,
           'created_at' = $this->created_at,
           'updated_at' = $this->updated_at,
         );
    }
}
