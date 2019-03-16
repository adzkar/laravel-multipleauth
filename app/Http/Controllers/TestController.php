<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\User;

class TestController extends Controller
{
    public function register()
    {
      return view('form_register');
    }

    public function prosesRegister(Request $req)
    {
      // return 'hola';
      $save = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => Hash::make($req->password)
      ]);
      $status = ['status' => 'failed'];
      if($save) {
        $status = ['status' => 'success'];
      }
      return redirect('hola')->with($status);
    }

    public function login()
    {
      return view('form_login');
    }

    public function prosesLogin(Request $req)
    {
      $credential = $req->only('email','password');
      $status = false;
      if(Auth::attempt($credential))
        $status = true;
      return (String)$status;
    }

    public function cek()
    {
      return (String)Auth::check();
    }

    public function logout()
    {
      Auth::logout();
      return 'hola';
    }

}
