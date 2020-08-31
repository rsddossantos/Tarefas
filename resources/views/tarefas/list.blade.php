@extends('layouts.admin')
@section('title', 'Tarefas')
@section('content')
    <h3>ToDo</h3><br/>
    @if(count($list) > 0)
        <table class="table table-hover">
        @foreach($list as $item)
            <tr>
                <td style="text-align:right;width:10%">
                    <a href="{{ route('tarefas.done', ['id' =>$item->id]) }}">
                        <button class="btn btn-default">@if($item->resolvido===1) <span style="color:#8c8c8c">done</span> @else todo @endif</button>
                    </a>
                </td>
                <td style="width:70%">
                    @if($item->resolvido===1) <strike style="color:#8c8c8c">{{$item->titulo}}</strike> @else {{$item->titulo}} @endif
                </td>
                <td style="text-align:right;width:10%">
                    <a href="{{ route('tarefas.edit', ['id' =>$item->id]) }}">
                        <button class="btn btn-success">editar</button>
                    </a>
                </td>
                <td style="width:10%">
                    <a href="{{ route('tarefas.del', ['id' =>$item->id]) }}" onclick="return confirm('Deseja excluir essa tarefa?')">
                        <button class="btn btn-danger">excluir</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </table>
    @else
        <div>Não há tarefas, aproveite seu dia de folga!</div>
    @endif
    <br/><div class="newtask"><a href="{{ route('tarefas.add') }}">+ Adicionar nova tarefa</a></div>
@endsection
