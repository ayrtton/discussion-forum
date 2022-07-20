@extends('layouts.main-layout')

@section('admin')
    <div class="container">
        @if (session('success'))
            <div id="snackbar">{{ session('success') }}</div>
        @elseif (session('error'))
            <div id="snackbar">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.questions.create') }}" class="btn btn-primary add-button">Add Question</a>
        <table class="questions-table">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Title</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td class="row-title">{{ $question->title }}</td>
                        <td>
                            <a href="{{ route('admin.questions.edit', $question->id) }}"
                                class="edit-restore-button">Edit</a>&nbsp;
                            <form class="delete-form" action="{{ route('admin.questions.destroy', $question->id) }}"
                                method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
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
