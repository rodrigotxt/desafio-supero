<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

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

    public function all(){
        return Task::all();
    }

    public function update(Request $request){
        if(!$request->id){
            $task = New Task;
            $task->title = $request->title;
            $task->status = 'em aberto';
            $task->save();
            return $task;
        }else{
            $task = Task::find($request->id);
            $task->title = $request->title;
            $task->status = $request->status;            
            $task->save();
            return $task;
        }
    }

    public function remove($id){
        try {         
            $task = Task::find($id);
            return $task->delete();
        } catch (Exception $e) {
            return response('Ocorreu um erro.', 400);
        }
    }
}
