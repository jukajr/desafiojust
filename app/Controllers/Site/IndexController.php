<?php

namespace App\Controllers\Site;

use App\Models\Categoria;
use App\Models\Post;

class IndexController
{
    public function index()
    {
        $posts = Post::join('categorias', 'categorias.id', '=', 'posts.categoria_id');

        if (isset($_GET['categoria'])) {
            $posts = $posts->where('posts.categoria_id', '=', $_GET['categoria']);
        }

        $posts = $posts->select('posts.*', 'categorias.nome as categoria')
            ->orderBy('posts.id', 'desc')
            ->get();

        $categorias = Categoria::orderBy('nome')->get();

        return view()->make('site.index', compact('posts', 'categorias'));
    }

    public function post($slug)
    {
        $categorias = Categoria::orderBy('nome')->get();

        $post = Post::join('categorias', 'categorias.id', '=', 'posts.categoria_id')
            ->select('posts.*', 'categorias.nome as categoria')
            ->where('posts.slug', $slug)
            ->first();

        return view()->make('site.detalhe', compact('post', 'categorias'));
    }
}
