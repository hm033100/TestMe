@extends('layouts.appmaster')
@section('title', 'Login Failed')

@section('content')
<h2>Login Failed</h2>

<button formaction="login" class="btn btn-primary">Try Again!</button>
@endsection