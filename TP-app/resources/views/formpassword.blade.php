@extends('layouts.mainLayout')

@section('title', 'Change Password')

@section('content')
	<form action="changepassword" method="post">
		@csrf
		<label for="password">New password</label><input type="password" id="password" name="password" required>
		<label for="pass2">Confirm password</label><input type="password" id="pass2" name="pass2" required>
		<input type="submit" value="Submit">
	</form>
	<p><a href="account">Go to account</a></p>
	@if (session('message'))
	<section>
		{{ session('message')}}
	</section>
	@endif
@endsection
