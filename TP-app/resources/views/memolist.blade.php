@extends('layouts.mainLayout')

@section('title', 'Memo list')

@section('content')
    @foreach ($memos as $memo)
        <h3>{{ $memo->title }}</h3>
        <p>{{ $memo->description }}</p>
    @endforeach
	<p><a href="{{route('view_account')}}">Go to account</a></p>
@endsection
