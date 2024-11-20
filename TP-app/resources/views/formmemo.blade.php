@extends('layouts.mainLayout')

@section('title', 'Add memo')

@section('content')
	<form action="{{route('memo_add')}}" method="post">
		@csrf
		<label for="title">Title</label><input type="text" id="title" name="title" required>
        <label for="description">Description</label><textarea name="description" rows="5" cols="40" id="description"></textarea>
		<input type="submit" value="Submit">
	</form>
	<p><a href="{{route('view_account')}}">Go to account</a></p>
@endsection