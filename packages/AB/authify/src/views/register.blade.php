@extends('welcome')

@section('content')
    <h1>Register Page</h1>
    <br></br>

    <form action="{{ url('/register') }}" method="post">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">

        <button type="submit">Register</button>
    </form>
@endsection