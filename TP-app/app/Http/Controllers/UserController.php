<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function connect(Request $request)
    {
        // 2. On vérifie que les données attendues existent
        if (!$request->has('login') || !$request->has('password'))
        {
            return redirect('signin')->with('message', 'Some POST data are missing.');
        }

        // 3. On sécurise les données reçues
        $login = $request->input('login');
        $password = $request->input('password');


        $user = new MyUser($login, $password);

        $isok = $user->exists();

        if(!$isok)
        {
            return redirect('signin')->with('message', 'Username or Password incorrect');
        }

        $request->session()->put('user', $user);

        return redirect('account');
    }


    public function create(Request $request)
    {
        if (!$request->has('login') || !$request->has('password') || !$request->has('pass2'))
        {
            return redirect('signup')->with('message', 'Some POST data are missing.');
        }

        $login = $request->input('login');
        $password = $request->input('password');

        if($password !== $request->input('pass2'))
        {
            return redirect('signup')->with('message', 'Password don\'t match');
        }

        $user = new MyUser($login, $password);

        try {
            $user->create();
        } catch (Exception $e) {
            return redirect('signup')->with('message', $e->getMessage());
        }
        
        return redirect('signin')->with('message', 'Account succesfully created, please connect.');
    }


    public function updatePassword(Request $request)
    {
        if(empty($request->user))
        {
            return redirect('signin')->with('message', 'Error, you are not connected.');
        }

        if (!$request->has('password') || !$request->has('pass2'))
        {
            return redirect('formpassword')->with('message', 'Some POST data are missing.');
        }

        $password = $request->input('password');

        if($password !== $request->input('pass2'))
        {
            return redirect('formpassword')->with('message', 'Password don\'t match.');
        }

        $user = $request->user;

        try {
            $user->modify($password);
        } catch (Exception $e) {
            return redirect('formpassword')->with('message', $e->getMessage());
        }

        return redirect('account')->with('message', 'Password succesfully changed.');
    }


    public function delete(Request $request)
    {
        if(empty($request->user))
        {
            return redirect('signin')->with('message', 'Error, you are not connected.');
        }

        $user = $request->user;

        try {
            $user->delete();
        } catch (Exception $e) {
            return redirect('account')->with('message', $e->getMessage());
        }

        return redirect('signin')->with('message', 'Account succesfully deleted.');
    }


    public function disconnect(Request $request)
    {
        $request->session()->flush();
	    return redirect('signin')->with('message', 'Succesfully disconnected.');
    }
} ?>