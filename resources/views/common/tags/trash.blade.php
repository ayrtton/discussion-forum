@extends('layouts.main-layout')

@section('admin')
    <div class="container">
        <table class="deleted-tags-table">
            <thead>
                <tr>
                    <td scope="col"></td>
                    <td scope="col">Title</td>
                    <td scope="col">Created</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedTags as $deletedTag)
                    <tr>
                        <td class="tr-counter">{{ $deletedTags->firstItem() + $loop->index }}</td>
                        <td>{{ $deletedTag->title }}</td>
                        <td>
                            @if ($deletedTag->created_at == null)
                                <span class="text-danger">Date not defined</span>
                            @else
                                {{ Carbon\Carbon::parse($deletedTag->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tags.restore', $deletedTag->id) }}"
                                class="edit-restore-button">Restore</a>&ensp;
                            <form class="delete-form" action="{{ route('tags.permanentlyDelete', $deletedTag->id) }}"
                                method="DELETE"
                                onsubmit="return confirm('Are you sure you want to permanently delete this tag?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="delete-button" value="Permanently Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
