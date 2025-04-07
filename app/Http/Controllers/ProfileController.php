<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::find(Auth::user()->role,['name']);

        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
            'role' => $role,
        ]);
    }   

    public function edit() {
        $id = Auth::user()->id;

        $user = User::findOrFail($id);
        return view('profile.update-profile-information-form', ['user' => $user]);
    }

    public function update(Request $request) {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|unique:users,email,'. $id,
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Dados do Utilizador Editados com sucesso');
    }

    public function password(){
        return view('profile.update-password-form');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($request->oldPassword, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'old_password' => ['A senha antiga está incorreta.'],
            ]);
        }
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Senha alterada com sucesso');
    }

    public function pricing(){
        return view('profile.pricing');
    }
}
