<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function loginMhs()
    {
      return view('mahasiswa.login');
    }

    public function prosesLogin(Request $req)
    {
      $credential = $req->only('email','password');
      return (String)Auth::guard('mhs')->attempt($credential);
    }

    public function register()
    {
      return view('mahasiswa.register');
    }

    public function prosesRegister(Request $req)
    {
      $save = Mahasiswa::create([
        'nama' => $req->nama,
        'email' => $req->email,
        'password' => Hash::make($req->password),
      ]);
      $status = ['status' => 'Failed'];
      if($save)
        $status = ['status' => 'Success'];
      return redirect('registermhs')->with($status);
    }

    public function status()
    {
      return (String)Auth::guard('mhs')->user();
    }

    public function logout()
    {
      Auth::guard('mhs')->logout();
      return 'hola';
    }

}
