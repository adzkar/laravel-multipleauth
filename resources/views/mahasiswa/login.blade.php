<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h1>Login Mahasiswa</h1>
    <form action="{{ route('loginmhs') }}" method="post">
      @csrf
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="login" value="Login">
    </form>
  </body>
</html>
