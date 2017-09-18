<?php

namespace App\Controllers\Controle;

use App\Models\Usuario;

class LoginController
{
    public function index()
    {
        return view()->make('controle.auth.login');
    }

    public function login()
    {
        $usuario = Usuario::where('email', $_POST['email'])->first();

        if ($usuario && password_verify($_POST['password'], $usuario->password)) {
            $_SESSION['user'] = $usuario;

            header('Location: /controle/home');
        } else {
            $_SESSION['msg']   = 'E-mail ou senha incorretos.';
            $_SESSION['error'] = true;

            header('Location: /controle');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: /controle');
    }
}
