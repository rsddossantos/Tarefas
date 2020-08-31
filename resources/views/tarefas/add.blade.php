@extends('layouts.admin')
@section('title', 'Adição de Tarefa')
@section('content')
    <h3>Nova Tarefa</h3>
    @if(session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="titulo" autofocus />
        </div>
        <div class="form-group">
            <input class="btn btn-default" type="submit" value="Adicionar" />
        </div>
    </form>
@endsection
