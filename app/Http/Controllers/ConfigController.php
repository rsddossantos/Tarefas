<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
        $nome = 'Rodrigo';
        $idade = 37;
        $cidade = $request->input('cidade');
        $lista = [

        ];
        $data = [
            'nome' => $nome,
            'sobrenome' => [
                'primeiro' => 'Silveira',
                'ultimo' => 'Santos'
            ],
            'idade' => $idade,
            'cidade' => $cidade,
            'lista' => $lista
        ];

        return view('admin.menu', $data);
    }
    public function info()
    {
        echo 'Configurações Menu INFO';
    }
    public function permissoes()
    {
        echo 'Configurações Permissões INFO';
    }
}
