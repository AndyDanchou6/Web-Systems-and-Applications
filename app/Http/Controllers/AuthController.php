<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function login_post(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $status = Auth::attempt($credentials);
        if (!$status) {
            return redirect(route('login'))->with('error', 'Invalid Credentials');
        }
        if (Auth::check() && Auth::user()->role == '1') {
            return redirect(route('admin.dashboard'));
        } else {

        return redirect(route('user.dashboard'));
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function register_post(Request $request) {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect()->back()->with('error', 'Something went wrong when registering your data');
        }
        return redirect(route('login'));
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function admin_change_pass(Request $request) {
        if (Auth::check()) {
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $id = Auth::user()->id;
            
            $update = User::find($id);
            $update->update([
                'password' => Hash::make($request->password),
            ]);

            if (!$update) {
                return redirect()->back()->with('error2', 'Can not change password');
            }

            return redirect()->back()->with('success', 'Change successfully');
        } else {
            return redirect()->back()->with('error1', 'Not Logged In');
        }
        // dd($update);
    }

    public function user_update(Request $request) {
        if (Auth::check()) {
            if ($request->name == !null) {
                $name = Auth::user();
                $name->update([
                    'name' => $request->name,
                ]);
            }

            if ($request->email == !null) {
                $request->validate([
                    'email' => 'email|unique:users',
                ]);

                $email = Auth::user();
                $email->update([
                    'email' => $request->email,
                ]);
            }

            if ($request->password == !null) {
                $request->validate([
                    'password' => 'min:8',
                ]);

                $password = Auth::user();
                $password->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Not Logged In');
        }
    }
}
