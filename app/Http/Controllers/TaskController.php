<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all tasks
        return Task::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store a coming task
        $newTask = new Task;

        // $attributes = $request->validate([
        //     'text' => 'required',
        //     'day' => 'required',
        //     'reminder' => 'required',
        // ]);
        // $newTask->create($attributes);

        $newTask->text = $request->task["text"];
        $newTask->day = $request->task["day"];
        $newTask->reminder = $request->task["reminder"];
        $newTask->save();
        return $newTask;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Task::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update task
        $existingTask =  Task::find($id);
        if($existingTask){
            $existingTask->text = $request->task["text"];
            $existingTask->day = $request->task["day"];
            $existingTask->reminder = $request->task["reminder"];
            $existingTask->save();
            return $existingTask;
        }

        return "No Task Found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete task
        $existingTask =  Task::find($id);
        if($existingTask){
            $existingTask->delete();
            return "Task Deleted Successfully";
        }

        return "No Task Found";
    }
}
