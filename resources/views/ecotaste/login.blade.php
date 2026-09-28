<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Login | EcoTaste</title><link rel="stylesheet" href="{{ asset('css/ecotaste.css') }}"></head>
<body class="auth-page">
    <a class="auth-brand" href="{{ route('ecotaste.login') }}">EcoTaste</a>
    <main class="auth-card">
        <p class="eyebrow">SELAMAT DATANG KEMBALI</p><h1>Sign In</h1><p class="muted">Masuk untuk melanjutkan kontribusimu.</p>
        @if (session('status'))<div class="alert">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <form action="{{ route('ecotaste.login.submit') }}" method="POST">
            @csrf
            <div class="form-group"><label for="identity">Username / E-mail</label><input id="identity" name="identity" type="text" value="{{ old('identity') }}" placeholder="Username atau nama@email.com" autocomplete="username" required></div>
            <div class="form-group"><label for="password">Password</label><input id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required></div>
            <label class="remember"><input type="checkbox" name="remember"> Ingat saya</label>
            <button class="btn btn-full" type="submit">Login</button>
        </form>
        <p class="auth-switch">Belum punya akun? <a href="{{ route('ecotaste.signup') }}">Sign Up</a></p>
    </main>
</body>
</html>
