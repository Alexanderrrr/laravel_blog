<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest');
      $this->middleware('age')->except('create');

    }
    public function create()
    {
      return view('register.create');

    }

    public function store()
    {
      $this->validate(
            request(),
       User::VALIDATION_RULES
        );

      $user = new User();
      $user->name = request('name');
      $user->email = request('email');
      $user->password = bcrypt(request('password')); //hesiranje sifre sa bcrypt
      $user->save();
      //$user = User::create(request()->all());
      auth()->login($user);
      session()->flash('message', 'Hvala sto ste se registrovali');
      return redirect('/posts');
    }
}
