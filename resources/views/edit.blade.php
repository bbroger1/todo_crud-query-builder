@extends('layouts.app')

@section('title', 'Editar Tarefas')

@section('content')
    <div class="text-center">
        <h3><b>Editar tarefas</b></h3>
    </div>

    <div class="text-end">
        <a class="btn btn-sm btn-outline-primary" href="{{ route('tasks.index') }}">
            Voltar
        </a>
    </div>
    <hr>

    @component('components/alert')
    @endcomponent

    @component('components/validation')
    @endcomponent

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-8 row">
                <div class="col-md-1">
                    <label for="title" class="col-form-label">Título</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </div>
    </form>
@endsection
