<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users'],
            'cedula' => ['required','max:10', 'unique:users'],
            'password' => ['required', 'min:8', 'unique:users']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
