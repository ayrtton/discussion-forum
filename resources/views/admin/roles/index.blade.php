@extends('layouts.main-layout')

@section('admin')
    <div class="container">
        @if (session('success'))
            <div id="snackbar">{{ session('success') }}</div>
        @elseif (session('error'))
            <div id="snackbar">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary add-button">Add Role</a>
        <table class="roles-permissions-table">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Title</td>
                    <td scope="col">Permissions</td>
                    <td scope="col">Created</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td class="row-title">{{ $role->title }}</td>
                        <td>
                            @forelse ($role->permissions as $permission)
                                <span class="permission-span">{{ $permission->title }}</span>
                            @empty
                                <span class="no-permissions-span">No Permissions</span>
                            @endforelse
                        </td>
                        <td>
                            @if ($role->created_at == null)
                                <span class="text-danger">Date not defined</span>
                            @else
                                {{ Carbon\Carbon::parse($role->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                                class="edit-restore-button">Edit</a>&nbsp;
                            <form class="delete-form" action="{{ route('admin.roles.destroy', $role->id) }}"
                                method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="delete-button" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
