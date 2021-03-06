<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }

    public function index()
    {
      return view('login.index');
    }


    public function login()
    {
      if(!auth()->attempt(request(['email', 'password']))) {
          return back()->withErrors([
            'message' => 'Omasijo si code'
          ]);
      }


      return redirect('/posts');
    }


    public function logout()
    {
      auth()->logout();

      return redirect('/posts');
    }
}
