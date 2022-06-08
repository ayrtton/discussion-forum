@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <table>
            <thead>
                <tr>
                    <td scope="col"></td>
                    <td scope="col">Title</td>
                    <td scope="col">Created</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td class="tr-counter">{{ $tags->firstItem() + $loop->index }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>
                            @if ($tag->created_at == null)
                                <span class="text-danger">Date not defined</span>
                            @else
                                {{ Carbon\Carbon::parse($tag->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center justify-end">
                                <a href="{{ route('tags.edit', $tag->id) }}" class="edit-button">Edit</a>&nbsp;
                                <form class="delete-form" action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="delete-button" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="tag-form">
            <div class="card">
                <div class="card-header">Add Tag</div>
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="py-3">
                <a class="btn btn-info" href="{{ route('tags.trash') }}">Deleted tags</a>
            </div>
        </div>
    </div>
@endsection
