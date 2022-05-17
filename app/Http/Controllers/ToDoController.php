<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('to_dos')->whereNull('deleted_at')->orderBy('status')->paginate(5);
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTasksRequest $request)
    {
        if (!$request->filled('title')) {
            return redirect('tasks/add')
                ->with('warning', 'Favor preencher o campo título.');
        }

        if (!DB::insert('INSERT INTO to_dos (title) values (:title)', [$request->title])) {
            return redirect('tasks/add')
                ->with('danger', 'Ocorreu um erro inesperado.');
        };

        return redirect('tasks')
            ->with('success', 'Tarefa cadastrada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$task = DB::select('SELECT * FROM to_dos WHERE id = :id', ['id' => $id])) {
            return redirect('tasks')
                ->with('danger', 'Tarefa não localizada.');
        };

        return view('edit', ['task' => $task[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTasksRequest $request, $id)
    {
        if (!$request->filled('title')) {
            return redirect("tasks/edit/$id")
                ->with('warning', 'Favor preencher o campo título.');
        }

        if (!DB::update('UPDATE to_dos SET title = :title WHERE id = :id', ['title' => $request->title, 'id' => $id])) {
            return redirect("tasks/edit/$id")
                ->with('warning', 'Algo inesperado ocorreu, refaça a operação.');
        }

        return redirect('tasks')
            ->with('success', 'Tarefa editada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!DB::update('UPDATE to_dos SET deleted_at = now() WHERE id = :id', ['id' => $id])) {
            return redirect("tasks/edit/$id")
                ->with('warning', 'Algo inesperado ocorreu, refaça a operação.');
        }

        return redirect('tasks')
            ->with('success', 'Tarefa excluída com sucesso.');
    }

    public function mark($id)
    {
        if (!DB::update('UPDATE to_dos SET status = 1 - status WHERE id = :id', ['id' => $id])) {
            return redirect("tasks")
                ->with('warning', 'Algo inesperado ocorreu, refaça a operação.');
        }

        return redirect('tasks');
    }
}
