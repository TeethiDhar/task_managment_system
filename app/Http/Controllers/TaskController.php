<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Repositories\TasksRepository;

class TaskController extends Controller
{
    protected $tasksrepository;

    public function __construct(TasksRepository $tasksrepository)
    {
        $this->tasksrepository = $tasksrepository;
    } 
    public function index()
    {
        
      $tasks =   $this->tasksrepository->show();
      return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function create()
    {
      $tasks =   null;
      return view ('tasks_folder.add', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
       $this->tasksrepository->store($request->all());
      return redirect()->route('tasks')->with('message','Tasks added Successfully');
    }

    public function edit(int $id)
    {
        $tasks = $this->tasksrepository->edit($id);
        return view ('tasks_folder.add', compact('tasks'));
    }

    public function update(Request $request , int $id)
    {
        $this->tasksrepository->update($request->all(), $id);
        return redirect()->route('tasks')->with('message','Tasks Updated Successfully');
    }

    public function destroy(int $id)
    {
        $this->tasksrepository->delete($id);
        return redirect()->route('tasks')->with('message','Tasks Deleted Successfully');
    }

    public function filter($status)
    {
        $tasks =  $this->tasksrepository->filter($status);
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function titleAcsSorting()
    {
        $tasks =  $this->tasksrepository->titleAcsSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function titleDescSorting()
    {
        $tasks =  $this->tasksrepository->titleDescSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function dateAcsSorting()
    {
        $tasks =  $this->tasksrepository->dateAcsSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function dateDescSorting()
    {
        $tasks =  $this->tasksrepository->dateDescSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function statusAcsSorting()
    {
        $tasks =  $this->tasksrepository->statusAcsSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

    public function statusDescSorting()
    {
        $tasks =  $this->tasksrepository->statusDescSorting();
        return view ('tasks_folder.tasks', compact('tasks'));
    }

}
