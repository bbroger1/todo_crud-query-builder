@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <div class="text-center">
        <h3><b>Lista de tarefas</b></h3>
    </div>

    <div class="text-end">
        <a class="btn btn-sm btn-outline-success" href="{{ route('tasks.create') }}">
            Nova tarefa
        </a>
    </div>
    <span id="msg_delete"></span>
    @component('components/alert')
    @endcomponent

    <hr />
    @forelse($tasks as $task)
        <div class="row mb-2" id="{{ $task->id }}">
            <div class="col-md-1 text-center">
                <a href="{{ route('tasks.mark', $task->id) }}">
                    @if ($task->status == 0)
                        <input class="form-check-input" type="checkbox" value="" name="status" id="status"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Concluir">
                    @else
                        <input class="form-check-input" checked type="checkbox" value="" name="status" id="status">
                    @endif
                </a>
            </div>
            <div class="col-md-8 text-center {{ $task->status == 1 ? 'text-decoration-line-through' : '' }} max='255'">
                {{ $task->title }}
            </div>
            <div class="col-md-3 text-center">
                <a class="btn btn-sm btn-primary" href="{{ route('tasks.edit', $task->id) }}" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal_delete"
                    data-bs-whatever="{{ $task->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </div>
        <hr>
    @empty
        <div class="text-center">
            <b>Sem tarefas no momento</b>
        </div>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>

    @component('components/modal_delete')
    @endcomponent

@endsection
