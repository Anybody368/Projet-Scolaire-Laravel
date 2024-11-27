@extends('layouts.mainLayout')

@section('title', 'Account')

@section('content')
	<p>
		Hello {{ session('user')->login }} !<br>
		Welcome on your account.
	</p>
	<p><a href="{{route('view_formmemo')}}">Add Memo</a></p>
	<p><a href="{{route('memo_show')}}">Show all Memos</a></p>
	<p><a href="{{route('user_signout')}}">Sign out</a></p>
	<p><a href="{{route('view_password')}}">Change password</a></p>
	<p><a href="{{route('user_delete')}}">Delete account</a></p>
@endsection