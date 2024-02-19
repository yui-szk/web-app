<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function create(Request $request): RedirectResponse
    {
        $task = new Task;

        $task->id = $request->id;
        $task->name = $request->name;
        $task->deadline_date = $request->deadline_date;
        $task->complete = $request->complete;

        $task->save();

        return redirect('/create');
    }
}
