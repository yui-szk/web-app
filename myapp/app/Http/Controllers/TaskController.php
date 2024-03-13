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
            'deadline_date' => 'required|after:yesterday',
        ]);

        $task = new Task();

        $task->name = $request->name;
        $task->deadline_date = $request->deadline_date;
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
                'deadline_date' => 'required|after:yesterday',
            ]);

            $task->name = $request->name;
            $task->deadline_date = $request->deadline_date;

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
}
