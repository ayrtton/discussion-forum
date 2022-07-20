@extends('layouts.main-layout')

@section('admin')
    <div class="container">
        <div class="update-tag-form">
            <div class="tag-card">
                <div class="card-header">Edit Tag</div>
                <div class="card-body">
                    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title"
                                value="{{ $tag->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
