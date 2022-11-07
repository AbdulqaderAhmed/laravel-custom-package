@extends('welcome')

@section('content')
    <h1>Login Page</h1>
    <br />

    <form action="{{ url('/login') }}" method="post">
        @csrf
        
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Login</button>
    </form>
@endsection