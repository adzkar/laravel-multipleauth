<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Login</title>
  </head>
  <body>
    <form action="{{ route('login') }}" method="post">
      @csrf
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="login" value="Login">
    </form>
  </body>
</html>
