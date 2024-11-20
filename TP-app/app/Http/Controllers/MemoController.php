<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function add(Request $request)
    {
        if (!$request->has('title'))
        {
            return to_route('view_formmemo')->with('message', 'Some POST data are missing.');
        }

        try
        {
            if ($request->filled('description'))
            {
                DB::table('memos')->insert([
                    'title' => $request->input('title'),
                    'description' => $request->input('description')
                ]);
            }
            else
            {
                DB::table('memos')->insert([
                    'title' => $request->input('title'),
                    'description' => "No description"
                ]);
            }
        }
        catch(Exception $e) 
        {
            return to_route('view_formmemo')->with('message', 'Error :'.$e.getMessage());
        }

        return to_route('view_account')->with('message', 'Memo succesfully added.');
    }

    public function show(Request $request)
    {
        return view('memolist', ['memos' => DB::table('memos')->get()]);
    }
} ?>
