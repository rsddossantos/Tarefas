@extends('layouts.admin')
@section('title', 'Edição de Tarefa')
@section('content')
    <h3>Editar Tarefa</h3><br/>
    @if(session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="titulo" value="{{ $data->titulo }}" autofocus />
        </div>
        <div class="form-group">
            <input class="btn btn-default" type="submit" value="Salvar" />
        </div>
    </form>
@endsection
