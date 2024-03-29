<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoAdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->title != "Intern") {
            return view('todo.admin.index');
        }
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('todo.intern.index', ['tasks' => $tasks]);
    }

    public function create($id)
    {
        TodoAdminController::abortIfNotAdmin();
        $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
        return view('todo.admin.create', ['users' => $users, 'project' => Project::find($id)]);
    }

    public function store(Request $req, $id)
    {
        TodoAdminController::abortIfNotAdmin();

        $formFields = $req->validate([
            'todo' => 'required',
            'assign_to' => 'required',
            'deadline' => 'required',
        ]);

        $formFields['project_id'] = $id;
        $formFields['user_id'] = $formFields['assign_to'];
        $user = User::find($formFields['assign_to']);
        $formFields['assign_to'] = $user->full_name;

        Task::create($formFields);
        return redirect(route('admin.projects.show', Project::find($id)));
    }

    public function show()
    {
        //
    }

    public function abortIfNotAdmin()
    {
        if (auth()->user()->role->title == "Intern") {
            abort(404);
        }
    }

    public function edit($id)
    {
        TodoAdminController::abortIfNotAdmin();
        $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
        $task = Task::find($id);
        return view('todo.admin.edit', ['task' => $task, 'users' => $users]);
    }

    public function update(Request $req, $id)
    {
        TodoAdminController::abortIfNotAdmin();

        $task = Task::find($id);
        if ($task->todo != $req->get('todo')) {
            $task->todo = $req->get('todo');
            $task->save();
        }
        if ($task->assign_to != $req->get('assign_to')) {
            $task->assign_to = $req->get('assign_to');
            $task->save();
        }
        if ($task->deadline != $req->get('deadline')) {
            $task->deadline = $req->get('deadline');
            $task->save();
        }
        return redirect(route('admin.projects.show', ['id' => $task->project_id]));
    }

    public function destroy($id)
    {
        TodoAdminController::abortIfNotAdmin();

        $task = Task::find($id);
        $task->delete();
        return back();
    }

    // update the task progress based on button click
    public function updateProgress($id)
    {
        $task = Task::find($id);
        if ($task->completed) {
            $task->completed = 0;
            $task->save();
        } else {
            $task->completed = 1;
            $task->save();
        }
        return back();
    }
}
