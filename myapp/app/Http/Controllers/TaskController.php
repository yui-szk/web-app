<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:50',
            'deadline' => 'nullable',
        ]);

        $task = new Task();

        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->status = $request->boolean(0);

        $task->save();

        return redirect('/list');
    }

    public function show()
    {
        $tasks = Task::all();
        return view('list', compact('tasks'));
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('edit', compact('task'));
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);

        if ($request->status === null) {
            $request->validate([
                'name' => 'required|max:50',
                'deadline' => 'nullable',
            ]);

            $task->name = $request->name;
            $task->deadline = $request->deadline;

        } else {
            $task->status = true;
        }

        $task->save();

        return redirect('/list');
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();

        return redirect('/list');
    }

    public function select(Request $request){
        $tasks = new Task;

        // if ($sortby){
        //     switch ($sortby){
        //         case 'default' :
        //             return redirect('/list');
        //         case 'deadline' :
        //             $tasks = Task::orderby('deadline', 'asc')->get();
        //             break;
        //         case 'latest' :
        //             $tasks = Task::orderby('created_at', 'desc')->get();
        //             break;
        //         case 'oldest' :
        //             $tasks = Task::orderby('created_at', 'asc')->get();
        //             break;
        //     }
        // }

        // if ($filterby){
        //     switch ($filterby){
        //         case 'default' :
        //             return redirect('/list');
        //         case 'completed' :
        //             $tasks = Task::whereStatus(1)->get();
        //             break;
        //         case 'not-completed' :
        //             $tasks = Task::whereStatus(0)->get();
        //             break;
        //     }
        // }


        $filter = $request->filter;
        $sort = $request->sort;

        if($filter && $sort){
            $tasks = Task::whereStatus($filter)->orderby(explode('|', $sort)[0], explode('|', $sort)[1])->get();
        } else if(($filter||$filter === 0) && !$sort){
            $tasks = Task::whereStatus($filter)->get();
        } else if (!$filter && $sort){
            $tasks = Task::orderby(explode('|', $sort)[0], explode('|', $sort)[1])->get();
        } else {
            return redirect('/list');
        }

        return view('list', compact('tasks', 'filter', 'sort'));

    }

}
