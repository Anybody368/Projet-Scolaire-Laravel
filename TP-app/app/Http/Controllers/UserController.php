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
            return to_route('view_signin')->with('message', 'Some POST data are missing.');
        }

        // 3. On sécurise les données reçues
        $login = $request->input('login');
        $password = $request->input('password');


        $user = new MyUser;
        $user->login = $login;
        $user->password = $password;

        $isok = $user->exists();

        if(!$isok)
        {
            return to_route('view_signin')->with('message', 'Username or Password incorrect');
        }

        $request->session()->put('user', $user);

        return to_route('view_account');
    }


    public function create(Request $request)
    {
        if (!$request->has('login') || !$request->has('password') || !$request->has('pass2'))
        {
            return to_route('view_signup')->with('message', 'Some POST data are missing.');
        }

        $login = $request->input('login');
        $password = $request->input('password');

        if($password !== $request->input('pass2'))
        {
            return to_route('view_signup')->with('message', 'Password don\'t match');
        }

        $user = new MyUser;
        $user->login = $login;
        $user->password = $password;

        try {
            $user->save();
        } catch (QueryException $e) { //Ne catch pas, il faudrait faire la vérif avant
            return to_route('view_signup')->with('message', $e->getMessage());
        }
        
        return to_route('view_signin')->with('message', 'Account succesfully created, please connect.');
    }


    public function updatePassword(Request $request)
    {
        if (!$request->has('password') || !$request->has('pass2'))
        {
            return to_route('view_password')->with('message', 'Some POST data are missing.');
        }

        $password = $request->input('password');
        $login = $request->user->login;

        if($password !== $request->input('pass2'))
        {
            return to_route('view_password')->with('message', 'Password don\'t match.');
        }

        $user = MyUser::where('login', $login)->first();

        $user->password = $password;
        $user->save();

        return to_route('view_account')->with('message', 'Password succesfully changed.');
    }


    public function delete(Request $request)
    {
        $user = $request->user;

        try {
            $user->delete();
        } catch (Exception $e) {
            return to_route('view_account')->with('message', $e->getMessage());
        }

        return to_route('view_signin')->with('message', 'Account succesfully deleted.');
    }


    public function disconnect(Request $request)
    {
        $request->session()->flush();
	    return to_route('view_signin')->with('message', 'Succesfully disconnected.');
    }
} ?>