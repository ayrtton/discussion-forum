<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create() {
        return view('admin.permissions.create');
    }

    public function store(StorePermissionRequest $request) {
        Permission::create($request->validated());

        return redirect()->route('admin.permissions.index')->with('success', 'Permission inserted sucessfully.');
    }

    public function edit(Permission $permission) {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission) {
        $permission->update($request->validated());

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated sucessfully.');
    }

    public function destroy(Permission $permission) {
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted sucessfully.'); 
    }
}
