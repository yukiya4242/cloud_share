<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
      return view('user.edit');
    }

    public function update(Request $request)
    {
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      return redirect()->back()->with('status', 'Profile updated!!');
    }

    public function show()
    {
      $photos = $user->photos;
      return view('user.show', compact('user', 'photos'));
    }

    public function index()
    {
      $users = User::all();
      return view('user.index', compact('users'));
    }
}

