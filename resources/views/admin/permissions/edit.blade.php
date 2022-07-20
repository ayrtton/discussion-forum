@extends('layouts.main-layout')

@section('admin')
    <div class="add-role-permission-container">
        <div class="add-role-permission-form">
            <div class="tag-card">
                <div class="card-header">Edit Permission</div>
                <div class="card-body">
                    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                                value="{{ $permission->title }}">
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