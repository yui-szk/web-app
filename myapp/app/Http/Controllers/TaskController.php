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
        $sortby = 'default';
        return view('list', compact('tasks', 'sortby'));
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

    public function sort(Request $request){
        $tasks = new Task;
        $sortby = $request->sortby;

        switch ($sortby){
            case 'default' :
                return redirect('/list');
            case 'deadline' :
                $tasks = Task::orderby('deadline', 'asc')->get();
                break;
            case 'latest' :
                $tasks = Task::latest()->get();
                break;
            case 'oldest' :
                $tasks = Task::oldest()->get();
                break;
        }

        return view('list', compact('tasks', 'sortby'));
    }
}
