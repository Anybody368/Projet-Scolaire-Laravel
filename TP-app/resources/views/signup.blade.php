@extends('layouts.mainLayout')

@section('title', 'Signup')

@section('content')
	<form action="adduser" method="post">
		@csrf
		<label for="login">Login</label>      <input type="text"     id="login"    name="login"    required autofocus>
		<label for="password">Password</label><input type="password" id="password" name="password" required>
		<label for="pass2">Confirm password</label><input type="password" id="pass2" name="pass2" required>
		<input type="submit" value="Signin">
	</form>
	@if (session('message'))
	<section>
		{{ session('message')}}
	</section>
	@endif
@endsection