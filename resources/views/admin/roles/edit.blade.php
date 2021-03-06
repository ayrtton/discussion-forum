@extends('layouts.main-layout')

@section('admin')
    <div class="add-role-permission-container">
        <div class="add-role-permission-form">
            <div class="tag-card">
                <div class="card-header">Edit Role</div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                aria-describedby="title" value="{{ $role->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="add-role-permission-container">
        <div class="add-role-permission-form">
            <div class="tag-card">
                <div class="card-header">Permissions</div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.permissions', $role->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="permissions[]" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->title))>
                                        {{ $permission->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
