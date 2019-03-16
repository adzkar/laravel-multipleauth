<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Register</title>
  </head>
  <body>
    @if ( session('status') )
      <h4>{{ session('status') }}</h4>
    @endif
    <form class="" action="{{ route('register') }}" method="post">
      @csrf
      <input type="text" name="name" placeholder="Name">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="regsiter" value="Register">
    </form>
  </body>
</html>
