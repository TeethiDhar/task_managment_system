<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class TasksRepository
{
    public function show()
    {
        return Task::get();
    }

    public function getById($id)
    {
        return Task::find($id);
    }

    public function create()
    {
        return Task::get();
    }

    public function store(array $data)
    {
        $tasks =  Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
            'dua_date' => $data['dua_date'],
        ]);

        return $tasks;
    }

    public function edit($id)
    {
        return Task::find($id);
    }

    public function update(array $data, int $id)
    {
        $tasks = Task::find($id);
        $tasks->update($data);
        return $tasks;
    }

    public function delete($id)
    {
        $tasks = Task::find($id);
        return $tasks->delete();
    }

    public function filter($status, $due_date = null)
    {
        $query = Task::where('status', $status);

        if ($due_date) {
            $query->where('due_date', $due_date);
        }
    
        $tasks = $query->get();

        return $tasks;
    }

    public function titleAcsSorting()
    {
        $tasks = Task::orderBy('title', 'asc')->get();

        return $tasks;
    }

    public function titleDescSorting()
    {
        $tasks = Task::orderBy('title', 'desc')->get();

        return $tasks;
    }

    public function dateAcsSorting()
    {
        $tasks = Task::orderBy('dua_date', 'asc')->get();

        return $tasks;
    }

    public function dateDescSorting()
    {
        $tasks = Task::orderBy('dua_date', 'desc')->get();

        return $tasks;
    }

    public function statusAcsSorting()
    {
        $tasks = Task::orderBy('status', 'asc')->get();

        return $tasks;
    }

    public function statusDescSorting()
    {
        $tasks = Task::orderBy('status', 'desc')->get();

        return $tasks;
    }
}

?>