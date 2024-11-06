@extends('layouts.mainLayout')

@section('title', 'Signin')

@section('content')
	<form action="authenticate" method="post">
		@csrf
		<label for="login">Login</label>      <input type="text"     id="login"    name="login"    required autofocus>
		<label for="password">Password</label><input type="password" id="password" name="password" required>
		<input type="submit" value="Signin">
	</form>
	<p>No account? <a href="signup">Sign up</a></p>
	@if (session('message'))
	<section>
		{{ session('message')}}
	</section>
	@endif
@endsection
