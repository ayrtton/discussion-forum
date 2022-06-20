@extends('admin.admin_master')

@section('admin')
    <div class="add-role-permission-container">
        <div class="add-role-permission-form">
            <div class="tag-card">
                <div class="card-header">Add Role</div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
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
@endsection