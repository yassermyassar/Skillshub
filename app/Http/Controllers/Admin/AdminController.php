<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index()
    {
        $adminRole = Role::where("role", "superadmin")->first();
        $superRole = Role::where("role", "admin")->first();
        $admins = User::whereIn("role_id", [$adminRole->id, $superRole->id])->orderBy('id', 'DESC')->paginate(10);

        $data['admins'] = $admins;
        return view("admin.admins.index")->with($data);
    }
    public function create()
    {
        //  = Role::select('id', 'role')->whereIn('name', ['admin', 'superadmin']);
        $data['roles'] = Role::select('id', 'role')->whereIn('role', ['admin', 'superadmin'])->get();

        return view("admin.admins.create")->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' =>  $request->password,
            'role_id' =>  $request->role_id,
        ]);
        event(new Registered($user));
        return redirect(url('dashboard/admins'));
    }
    public function promote($id, Request $request)
    {
        $admin = User::findOrFail($id);
        $admin->update([
            'role_id' => Role::select('id')->where('role', 'superadmin')->first()->id,
        ]);
        $request->session()->flash('msg', 'promote done successfully');
        return back();
    }


    public function demote($id, Request $request)
    {
        $superadmin = User::findOrFail($id);
        $superadmin->update([
            'role_id' => Role::select('id')->where('role', 'admin')->first()->id,
        ]);
        $request->session()->flash('msg', 'demote done successfully');
        return back();
    }
}
