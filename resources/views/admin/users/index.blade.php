@extends('admin.admin_master')

@section('admin')
    <div class="container">
        @if (session('success'))
            <div id="snackbar">{{ session('success') }}</div>
        @elseif (session('error'))
            <div id="snackbar">{{ session('success') }}</div>
        @endif
        <table class="users-table">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Name</td>
                    <td scope="col">Role</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role->title }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="edit-restore-button">Edit</a>&nbsp;
                            <form class="delete-form" action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
