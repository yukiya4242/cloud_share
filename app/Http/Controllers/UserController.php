<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(User $user)
    {

      if (Auth::user()->id != $user->id) {

      }

      return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      session()->flash('message', 'ユーザー情報を更新しました');

      return redirect()->back()->with('status', ' ');
    }

    public function show(User $user)
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

