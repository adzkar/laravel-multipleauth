<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <h1>Register Mahassiswa</h1>
    @if ( session('status') )
      <p>
        {{ session('status') }}
      </p>
    @endif
    <form action="{{ route('registermhs') }}" method="post">
      @csrf
      <input type="text" name="nama" placeholder="Nama">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="register" value="Register">
    </form>
  </body>
</html>
