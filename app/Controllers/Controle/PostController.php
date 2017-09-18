<?php

namespace App\Controllers\Controle;

use App\Models\Categoria;
use App\Models\Post;
use Cocur\Slugify\Slugify;
use WideImage\WideImage as WideImage;

class PostController
{
    public function index()
    {
        $posts = Post::join('categorias', 'categorias.id', '=', 'posts.categoria_id')
            ->select('posts.*', 'categorias.nome as categoria')
            ->orderBy('posts.id', 'desc')
            ->get();

        return view()->make('controle.post.index', compact('posts'));
    }

    public function form($id = null)
    {
        $categorias = Categoria::orderBy('nome')->get();

        if ($id) {
            $post = Post::find($id);

            return view()->make('controle.post.form', compact('post', 'categorias'));
        }

        return view()->make('controle.post.form', compact('categorias'));
    }

    public function save()
    {
        if ($_FILES['imagem']["size"] > 0) {
            $imagem = \WideImage\WideImage::load('imagem');

            $path = $_FILES['imagem']['name'];

            $extensao = pathinfo($path, PATHINFO_EXTENSION);
            $novoNome = md5($_FILES['imagem']['name'] . date('his')) . "." . $extensao;

            $imagem->saveToFile("data/post/" . $novoNome);

            $_POST['imagem'] = $novoNome;

            $imagem->destroy();

        } else {
            unset($_POST['imagem']);
            $imagens = null;
        }

        $slugify       = new Slugify();
        $_POST['slug'] = $slugify->slugify($_POST['titulo']);

        Post::create($_POST);

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/post');
    }

    public function update()
    {
        $post = Post::find($_POST['id']);

        if ($_FILES['imagem']["size"] > 0) {
            $imagem = \WideImage\WideImage::load('imagem');

            $path = $_FILES['imagem']['name'];

            $extensao = pathinfo($path, PATHINFO_EXTENSION);
            $novoNome = md5($_FILES['imagem']['name'] . date('his')) . "." . $extensao;

            $imagem->saveToFile("data/post/" . $novoNome);

            $_POST['imagem'] = $novoNome;

            $imagem->destroy();

        }

        $slugify       = new Slugify();
        $_POST['slug'] = $slugify->slugify($_POST['titulo']);

        $post->update($_POST);

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/post');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        $_SESSION['msg']   = 'Operação realizada com sucesso.';
        $_SESSION['error'] = false;

        header('Location: /controle/post');
    }
}
