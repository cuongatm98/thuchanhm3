<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function showFormRegister()
    {
        return view('login.register');
    }

    public function storeRegister(request $request): \Illuminate\Http\RedirectResponse
    {
        $users = new User();
        $users->name = $request->input("name");
        $users->email = $request->input("email");
        $users->password = Hash::make($request->input('password'));
        $users->phone = $request->input('phone');
        $users->address = $request->input('address');
        $users->date_of_birth = $request->input('date_of_birth');
        $users->save();
        $message = 'Đăng kí thành công';
        $request->session()->flash('success', $message);
        return redirect()->back();
    }
}
