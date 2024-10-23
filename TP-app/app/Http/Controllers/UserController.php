<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function connect(Request $request)
    {
        session_start();
        unset($_SESSION['message']);


        // 2. On vérifie que les données attendues existent
        if (!$request->has('login') || !$request->has('password'))
        {
            $_SESSION['message'] = "Some POST data are missing.";
            return redirect('signin');
        }

        // 3. On sécurise les données reçues
        $login = $request->input('login');
        $password = $request->input('password');


        $user = new MyUser($login, $password);

        $isok = $user->exists();

        if(!$isok)
        {
            $_SESSION['message'] = "Username or Password incorrect";
            return redirect('signin');
        }

        $_SESSION['user'] = $login;

        return redirect('account');
    }


    public function create(Request $request)
    {
        session_start();
        unset($_SESSION['message']);

        if (!$request->has('login') || !$request->has('password') || !$request->has('pass2'))
        {
            $_SESSION['message'] = "Some POST data are missing.";
            return redirect('signup');
        }

        $login = $request->input('login');
        $password = $request->input('password');

        if($password !== $request->input('pass2'))
        {
            $_SESSION['message'] = "Password doesn't match.";
            return redirect('signup');
        }

        $user = new MyUser($login, $password);

        try {
            $user->create();
        } catch (Exception $e) {
            $_SESSION['message'] = $e;
            return redirect('signup');
        }
        
        $_SESSION['message'] = "Account succesfully created, please connect.";
        return redirect('signin');
    }


    public function updatePassword(Request $request)
    {
        session_start();
        unset($_SESSION['message']);

        if(empty($_SESSION['user']))
        {
            $_SESSION['message'] = "Error, you are not connected.";
            return redirect('signin');
        }

        if (!$request->has('password') || !$request->has('pass2'))
        {
            $_SESSION['message'] = "Some POST data are missing.";
            return redirect('formpassword');
        }

        $login = $_SESSION['user'];
        $password = $request->input('password');

        if($password !== $request->input('pass2'))
        {
            $_SESSION['message'] = "Password doesn't match.";
            return redirect('formpassword');
        }

        $user = new MyUser($login, $password);

        try {
            $user->modify();
        } catch (Exception $e) {
            $_SESSION['message'] = $e;
            return redirect('formpassword');
        }
        
        $_SESSION['message'] = "Password succesfully changed.";
        return redirect('account');
    }


    public function delete(Request $request)
    {
        session_start();
        unset($_SESSION['message']);

        if(empty($_SESSION['user']))
        {
            $_SESSION['message'] = "Error, you are not connected.";
            return redirect('signin');
        }

        $user = new MyUser($_SESSION['user']);

        try {
            $user->delete();
        } catch (Exception $e) {
            $_SESSION['message'] = $e;
            return redirect('account');
        }

        $_SESSION['message'] = "Account succesfully deleted.";
        return redirect('signin');
    }


    public function disconnect(Request $request)
    {
        session_start();
	    session_destroy(); // ou unset($_SESSION['user']);
        $_SESSION['message'] = "Succesfully disconnected.";
	    return redirect('signin');
    }
} ?>