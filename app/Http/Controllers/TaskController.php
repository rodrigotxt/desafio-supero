<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(Request $request){
        if($request->id){
            $task = Task::find($request->id);
        }else{
            $task = New Task;
            $task->title = $request->title;
            $task->status = 'em aberto';
            $task->save();
            return $task;
        }
    }

    //
}
