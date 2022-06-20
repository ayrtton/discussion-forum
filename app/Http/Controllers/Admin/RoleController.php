<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request) {
        Role::create($request->validated());

        return redirect()->route('admin.roles.index')->with('success', 'Role inserted sucessfully.');
    }

    public function edit(Role $role) {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role) {
        $role->update($request->validated());

        return redirect()->route('admin.roles.index')->with('success', 'Role updated sucessfully.');
    }

    public function destroy(Role $role) {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted sucessfully.'); 
    }
}
