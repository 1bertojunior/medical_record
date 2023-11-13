@extends('app.layouts.auth')

@section('title', $title)

@section('content')
    <div class="login-container">
        <h1>Login do Funcionário (ADM/User)</h1>
        <form class="login-form" action="{{ route('app.login') }}" method="post">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <span> {{$message }}</span>
            @enderror
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="password" required>
            @error('password')
                <span> {{$message }}</span>
            @enderror

            @error('error')
                <span> {{$message }}</span>
            @enderror

            <input type="submit" value="Login">
        </form>
    </div>
@endsection
