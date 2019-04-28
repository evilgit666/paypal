<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::get();
        return view('member.index',compact('user'));
    }


    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('member.edit',compact('user','roles', 'userRole'));
    }
    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $user->name =  $request->name;
        if ($request->password) {

            $user->password =  Hash::make($request->password);

        }
        $user->save();
        if ($request->input('roles')) {
            $user = User::find($id);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
        }
        return back();
    }




    public function create(Request $request)
    {
        $user = new User();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back();
    }
}
