@extends('layouts.admin')
@section('title', '*Menu*')

@section('content')
    <h1>MENU <small>versão: {{$versao}}</small></h1>
    <hr><br>
    <!--
    @component('components.alert')
        Algum aviso qualquer
    @endcomponent
    -->
    <br><br>
    <x-alert>
        Alguma coisa....
    </x-alert>

    <br><hr>
    <form method="POST">
        @csrf
        Nome:<br/>
        <input type="text" name="nome" /><br/>

        Idade:<br/>
        <input type="text" name="idade" /><br/>

        Cidade:<br/>
        <input type="text" name="cidade" /><br/><br/>

        <input type="submit" value="Enviar" />
    </form>
@endsection
