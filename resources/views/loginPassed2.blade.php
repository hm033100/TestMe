@extends('layouts.appmaster') 
@section('title', 'Login Passed Page')

@section('content') 

	@if($model->getUsername() == 'hermes')
		<h3>Hermes you have logged in successfully.</h3>
	@else
		<h3>Someone besides hermes has logged in!</h3>
	@endif
	<br>
	<a href="login">Login Again</a>
@endsection
