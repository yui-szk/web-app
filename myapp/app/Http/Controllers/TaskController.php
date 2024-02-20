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

        $task->name = $request->name;
        $task->deadline_date = $request->deadline_date;
        $task->complete = $request->boolean(0);

        $task->save();

        return redirect('/create');
    }
}
