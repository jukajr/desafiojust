<?php

namespace App\Controllers\Controle;

use App\Models\Categoria;

class CategoriaController
{
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view()->make('controle.categoria.index', compact('categorias'));
    }

    public function form($id = null)
    {
        if ($id) {
            $categoria = Categoria::find($id);

            return view()->make('controle.categoria.form', compact('categoria'));
        }

        return view()->make('controle.categoria.form');
    }

    public function save()
    {
        Categoria::create($_POST);

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/categoria');
    }

    public function update()
    {
        $categoria = Categoria::find($_POST['id']);

        $categoria->update($_POST);

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/categoria');
    }

    public function delete($id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/categoria');
    }
}
