<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  public function index()
  {
    return view('admin.pages.auth.login');
  }

  /**
   * Handle an authentication attempt.
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $credentials = $request->only('email', 'password');
    $remember = !empty($request->input('remember')) ? true : false;

    if (Auth::attempt($credentials, $remember)) {
      return redirect()->route('admin.dashboard.index');
    } else {
      $request->session()->flash('danger', 'E-mail ou senha inválidos.');
      return redirect()->back();
    }
  }
}