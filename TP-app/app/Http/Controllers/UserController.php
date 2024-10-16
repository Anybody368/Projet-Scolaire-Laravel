<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function connect()
    {
        session_start();
        unset($_SESSION['message']);


        // 2. On vérifie que les données attendues existent
        if (!$request->has('login') || !$request->has('password'))
        {
            $_SESSION['message'] = "Some POST data are missing.";
            return redirect()->route('signin');
        }

        // 3. On sécurise les données reçues
        $login = $request->input('login');
        $password = $request->input('password');


        $user = new MyUser($login, $password);

        $isok = $user->exists();

        if(!$isok)
        {
            $_SESSION['message'] = "Username or Password incorrect";
            header('Location: signin.php');
            	exit;
        }

        $_SESSION['user'] = $login;

        header('Location: account.php');
        exit();
    }
} ?>