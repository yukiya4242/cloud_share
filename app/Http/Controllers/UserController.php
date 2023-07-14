<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
      $request->validate([
        'name' => 'required',
        'email' => 'required | email',
        'profile_image' => 'image | max:2048',
      ]);

      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;

      if ($request->hasFile('profile_image')){
        $filename = $user->id.'Profile.jpeg';
        $path = $request->file('profile_image')->storeAs('public/photos', $filename);
        $image = Image::make(public_path('storage/photos/'.$filename))->fit(300, 300);
        $image->save();

        $user->profile_image = $filename;
      }

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

