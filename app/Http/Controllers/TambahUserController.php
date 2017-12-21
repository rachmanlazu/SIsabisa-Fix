<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class TambahUserController extends Controller
{
  // use RegistersUsers;
  //
  // public function __construct()
  // {
  //     $this->middleware('guest');
  // }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);
  }

  public function karyawan()
  {
      $password = request('password');

      User::create([
          'name' => request('name'),
          'email' => request('email'),
          'nim' => request('nim'),
          'password' => bcrypt($password),
          'role' => request('role'),
          'supervisor' => Auth::user()->id,
      ]);
      return redirect('/daftar-karyawan');
  }
}
