<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Masjid Al-Amin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="background-donasi">
<div class="login-container">
  <div class="login-box">
    <h2>Login Masjid Al-Amin</h2>

    @if ($errors->any())
      <div class="error-message">
        {{ $errors->first('login') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <div class="form-group-login">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>

      <div class="form-group-login">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>

      <button type="submit" class="btn-login-pg">Login</button>
    </form>
  </div>
</div>

</body>
</html>
