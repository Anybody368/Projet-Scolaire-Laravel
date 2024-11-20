<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MyUser;

class UserController extends Controller
{
	/**************************************************************************
	 * Connect a user with login and password.
	 */
    public function connect(Request $request) {
		if ( !$request->filled(['login','password']) )
			return redirect('signin')->with('message',"Some POST data are missing.");

		$user = new MyUser($request->login,$request->password);

		try {
			if ( !$user->exists() )
				return redirect('signin')->with('message','Wrong login/password.');
		}
		catch (\Exception $e) {
			return redirect('signin')->with('message',$e->getMessage());
		}

		$request->session()->put('user',$user);

		return redirect('account');
	}

	/**************************************************************************
	 * Create a new user.
	 */
	public function create(Request $request) {
		if ( !$request->filled(['login','password','confirm']) )
			return redirect('signup')->with('message',"Some POST data are missing.");

		if ( $request->password !== $request->confirm )
			return redirect('signup')->with('message',"The two passwords differ.");

		$user = new MyUser($request->login,$request->password);

		try {
			$user->create();
		}
		catch (\Exception $e) {
			return redirect('signup')->with('message',$e->getMessage());
		}

		return redirect('signin')->with('message',"Account created! Now, signin.");
	}

	/**************************************************************************
	 * Update the password of the connected user.
	 */
	public function updatePassword(Request $request) {
		if ( !$request->user )
			return redirect('signin');

		if ( !$request->filled(['newpassword','confirmpassword']) )
			return redirect('formpassword')->with('message',"Some POST data are missing.");

		if ( $request->newpassword != $request->confirmpassword )
			return redirect('formpassword')->with('message',"Error: passwords are different.");

		try {
			$request->user->changePassword($request->newpassword);
		}
		catch (\Exception $e) {
			return redirect('formpassword')->with('message',$e->getMessage());
		}

		return redirect('account')->with('message',"Password successfully updated.");
	}

	/**************************************************************************
	 * Delete the connected user.
	 */
	public function delete(Request $request) {
		if ( !$request->user )
			return redirect('signin');

		try {
			$request->user->delete();
		}
		catch (\Exception $e) {
			return redirect('account')->with('message',$e->getMessage());
		}

		$request->session()->flush();

		return redirect('signin')->with('message',"Account successfully deleted.");
	}

	/**************************************************************************
	 * Disconnect the connected user.
	 */
	public function disconnect(Request $request) {
		$request->session()->flush();
		return redirect('signin');
	}
}
