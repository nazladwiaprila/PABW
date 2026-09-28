<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Sign Up | EcoTaste</title><link rel="stylesheet" href="{{ asset('css/ecotaste.css') }}"></head>
<body class="auth-page">
    <a class="auth-brand" href="{{ route('ecotaste.login') }}">EcoTaste</a>
    <main class="auth-card">
        <p class="eyebrow">GABUNG BERSAMA KAMI</p><h1>Sign Up</h1><p class="muted">Buat akun untuk mulai berkontribusi.</p>
        @if ($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <form action="{{ route('ecotaste.signup.submit') }}" method="POST">
            @csrf
            <div class="form-group"><label for="username">Username</label><input id="username" name="username" value="{{ old('username') }}" placeholder="Nama pengguna" autocomplete="username" required></div>
            <div class="form-group"><label for="email">E-mail</label><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required></div>
            <div class="form-group"><label for="password">Password</label><input id="password" name="password" type="password" placeholder="Minimal 6 karakter" autocomplete="new-password" required></div>
            <div class="form-group"><label for="password_confirmation">Konfirmasi Password</label><input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password" autocomplete="new-password" required></div>
            <button class="btn btn-full" type="submit">Sign Up</button>
        </form>
        <p class="auth-switch">Sudah punya akun? <a href="{{ route('ecotaste.login') }}">Login</a></p>
    </main>
</body>
</html>
