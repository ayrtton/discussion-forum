@extends('admin.admin_master')

@section('admin')
    <div class="container">
        @if (session('success'))
            <div id="snackbar">{{ session('success') }}</div>
        @elseif (session('error'))
            <div id="snackbar">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary add-button">Add Permission</a>
        <table class="roles-permissions-table">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Title</td>
                    <td scope="col">Created</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->title }}</td>
                        <td>
                            @if ($permission->created_at == null)
                                <span class="text-danger">Date not defined</span>
                            @else
                                {{ Carbon\Carbon::parse($permission->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                class="edit-restore-button">Edit</a>&nbsp;
                            <form class="delete-form" action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this permission?');">
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
