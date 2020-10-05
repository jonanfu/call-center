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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email', 'unique:users'],
            'cedula' => ['required','min:10', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera,
            'nivel' => $request->nivel,
            'paralelo' => $request->paralelo,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Se ha registrado un usuario');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'min:8']
        ]);
        
        $user->update([ 'password' => Hash::make($request->password) ] + $request->all());
        return back()->with('status', 'Se ha actualizado los datos del usuario');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
