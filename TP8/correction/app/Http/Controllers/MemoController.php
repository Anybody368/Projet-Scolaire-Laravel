<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function add( Request $request ) {
		if ( !$request->filled(['title','content']) )
			return to_route('view_formmemo')->with('message',"Some POST data are missing.");

		$memo = new Memo;
		$memo->title = $request->title;
		$memo->content = $request->content;
		$memo->owner = $request->user->login;
		$memo->save();

		return to_route('view_account')->with('message',"New memo added.");
	}

	public function show( Request $request ) {
		$memos = $request->user->fresh()->memos;
		return view('memolist',['memos'=>$memos]);
	}
}
