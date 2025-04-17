<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        $search = '';
        $users = User::where('role', 'student')->paginate(10);
        return view('admin.students', compact('users','search'));
    }

    public function register(){
        return view('auth.register');
    }

    public function store(UserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->nivel = $request->nivel;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();
        Auth::login($user);
        return redirect(route('home'));
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Registos do utilizador excluidos');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Dados Editados com sucesso');
    }
}
