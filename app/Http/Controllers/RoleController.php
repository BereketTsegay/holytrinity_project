<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()  {
        $role = Role::all();
        return Inertia::render('admin/roles',['role'=>$role]);
    }
    public function create()  {
        return Inertia::render('admin/role_create');
    }
    public function store(Request $request)  {
        $role = $request->id? Role::findById($request->id)->get() : new Role();
        $request->validate([
            "name"=>['required', Rule::unique('roles',$request->id??null)]
        ]);
        $role->name=$request->name;
        $role->save();

        return redirect()->intended();
    }
}
