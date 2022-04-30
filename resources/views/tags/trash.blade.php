<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Deleted Tags
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deletedTags as $deletedTag)
                                            <tr>
                                                <th valign="middle" scope="row">
                                                    {{ $deletedTags->firstItem() + $loop->index }}</th>
                                                <td valign="middle">{{ $deletedTag->title }}</td>
                                                <td valign="middle">
                                                    @if ($deletedTag->created_at == null)
                                                        <span class="text-danger">Date not defined</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($deletedTag->created_at)->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td valign="middle">
                                                    <div class="flex items-center justify-end">
                                                        <a href="{{ route('tags.restore', $deletedTag->id) }}"
                                                            class="btn btn-success">Restore</a>
                                                        &ensp;
                                                        <form class="inline-block"
                                                            action="{{ route('tags.permanentlyDelete', $deletedTag->id) }}"
                                                            method="DELETE"
                                                            onsubmit="return confirm('Are you sure you want to permanently delete this tag?');">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-danger"
                                                                value="Permanently Delete">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
