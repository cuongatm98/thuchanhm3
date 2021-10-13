<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{   public function index()
{
    $user = Auth::user();
    return view('users.list', compact('user'));

}

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->save();
        session::flash('success', 'Tạo mới thành công');
        return redirect()->route('admin.customers.index');
    }

    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('backend.customers.edit', compact('customers'));
    }

    public function update(request $request, $id)
    {
        $customers = Customer::find($id);
        $customers->name = $request->input('name');
        if ($request->hasFile('image')) {
            $currentImg = $customers->image;
            if ($currentImg) {
                Storage::delete('/public/', $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $customers->image = $path;
        }
        $customers->email = $request->input('email');
        $customers->password = $request->input('password');
        $customers->address = $request->input('address');
        $customers->phone = $request->input('phone');
        $customers->date_of_birth	 = $request->input('date_of_birth');
        $customers->save();
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('admin.customers.index');
    }
    public function destroy($id){
        $customers = Customer::find($id);
        $image = $customers->image;

        //delete image

        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $customers->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('admin.customers.index');
    }
}
