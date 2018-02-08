<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use Session;

class TaskController extends Controller
{
    public function index(){
      $tasks = Task::all();
      return view('task.index')->with('tasks' , $tasks);
    }

    public function addTask(Request $request) {
      $input = $request->all();
      // dd($input);
      $task = new Task;
      $task->title = $input['title'];
      $task->description = $input['description'];
      $task->created_at = Carbon::now();
      $task->save();
      Session::flash('flash_message', 'Task successfully added!');

      return redirect()->back();
    }


    public function destroy($id) {
      $task = Task::findOrFail($id);
      // dd($task->completed);
      $task->delete();

      Session::flash('flash_message_delete', 'Task successfully deleted!');

      return redirect()->back();

    }
    public function completed($id) {
      $task = Task::findOrFail($id);
      $task->completed = 1;
      $task->save();

      Session::flash('flash_message', 'Task successfully Finished!');
      return redirect()->back();


    }


}
