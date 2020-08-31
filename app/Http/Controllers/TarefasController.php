<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// para acesso ao banco
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list()
    {
        $list = DB::select('SELECT * FROM tarefas ORDER BY resolvido,id');
        $dados = ['list' => $list];
        return view('tarefas.list', $dados);
    }
    public function add()
    {
        return view('tarefas.add');
    }
    public function addAction(Request $request)
    {
        if($request->filled('titulo')) {
            $titulo = $request->input('titulo');
            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo'=>$titulo
            ]);
            return redirect()->route('tarefas.list');
        } else {
            return redirect()
                ->route('tarefas.add')
                ->with('warning', 'Descrição deve ser preenchida!');
        }
    }
    public function edit($id)
    {
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);
        if(count($data) > 0) {
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }
    public function editAction(Request $request, $id)
    {
        if($request->filled('titulo')) {
            $titulo = $request->input('titulo');
            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                'id' => $id,
                'titulo' => $titulo
            ]);
            return redirect()->route('tarefas.list');
        } else {
            return redirect()
                ->route('tarefas.edit', ['id'=>$id])
                ->with('warning', 'Descrição deve ser preenchida!');
        }
    }
    public function del($id)
    {
        DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);
        return redirect()->route('tarefas.list');
    }
    public function done($id)
    {
        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id' => $id
        ]);
        return redirect()->route('tarefas.list');
    }
}
