<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin.edit', compact('admin'));
    }
    public function update(Request $request)
    {
        $admin = Admin::find($request->id);
        $admin->update([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'fulladdress' => $request->fulladdress,

        ]);
        $user = User::find($admin->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password),
            'user_type' => 'admin',
        ]);
        return redirect(route('admin.admin.index'))->with('success','Data berhasil diubah');
    }
    public function add()
    {
        $admin = Admin::all();
        return view('admin.admin.add', compact('admin'));
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'admin',
        ]);

        $admin = Admin::create([
            'fullname' => $request->fullname,
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'fulladdress' => $request->fulladdress,

        ]);
        return redirect(route('admin.admin.index'))->with('success','Data berhasil ditambahkan');
    }
    public function delete($id)
    {
        $admin = Admin::find($id);
        User::where('id', $admin->user_id)->delete();
        $admin->delete();
        return redirect(route('admin.admin.index'))->with('success','Data berhasil dihapus');
    }
}
