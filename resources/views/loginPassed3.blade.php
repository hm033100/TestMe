@extends('layouts.appmaster')
@section('title', 'Login Passed Page')

@section('content')
@if($model->getUsername() == 'hermes')
<h2>Login Passed</h2> 
@else
<h2>Login Other Passed</h2>
@endif
<a href="login3">Try Again</a>
@endsection