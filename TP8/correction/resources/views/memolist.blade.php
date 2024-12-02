@extends('layouts.mainLayout')

@section('title','Memo list')

@section('content')
	<h1>Your memo list</h1>

	@forelse ($memos as $memo)
		<section>
			<h5>{{ $memo->title }}</h5>
			<p>{{ $memo->content }}</p>
		</section>
		<hr>
	@empty
		<p>No memo.</p>
	@endforelse

	<p>
		Go back to <a href="{{ route('view_account') }}">Home</a>.
	</p>
@endsection
