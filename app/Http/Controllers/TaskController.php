<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Repositories\TaskRepository;
use App\Mail\HireAdded;
use Illuminate\Support\Facades\Mail;


class TaskController extends Controller
{
    /**
    * The Task repository instance
    *
    * @var TaskRepository
    */
    protected $tasks;

    /**
    * Create a new controller instance
    *
    * @param TsakRepository $tasks
    * return void
    */

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /** Display a list of all of the user's tasks
    * @param Request $request
    * @return Response
    */

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $task = $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        Mail::to('kiuraalex@gmail.com')->send(new HireAdded($task));
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');

    }
}
