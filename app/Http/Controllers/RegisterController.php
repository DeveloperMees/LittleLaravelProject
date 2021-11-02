<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
            $users = User::all();
            return view('users.index', compact('users'));
    }

    public function create()
    {
            return view('register.create');
    }


    public function edit(User $user)
    {
            //
            return view('users/edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect('users/index')->with('success', 'User has been successfully updated.');
    }

    public function store()
    {
        // Validate user request

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'User account has been created!');

        return redirect('/');

    }

    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect('/users/index')->with('success', 'User has been deleted');
    }
}
