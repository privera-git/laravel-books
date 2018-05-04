@extends('layouts.master')

@section('title', 'Books')

@section('content')
    <h1>Books</h1>

    <p>Git template branch</p>

    @if (isset($books) && count($books) > 0) 
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr id="{{ $book->id }}">
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>
                        
                    <form id="form-delete-{{ $book->id }}" action="{{ action('BookController@destroy', $book->id) }}" method="POST" class="form-delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a href="{{ action('BookController@show', $book->id) }}" role="button" class="btn btn-outline-success btn-sm">View</a>
                        <a href="{{ action('BookController@edit', $book->id) }}" role="button" class="btn btn-outline-primary btn-sm">Edit</a>
                        <button class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $book->id }}">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No books found.</p>
    @endif

    @if (isset($success))
        @if ($success)
            <div class="alert alert-success">The book was successfully deleted.</div>
        @else
            <div class="alert alert-danger">An error occured while deleting the book.</div>
        @endif
    @endif

    <a href="{{ action('BookController@create') }}" role="button" class="btn btn-primary">New...</a>
@endsection

@section ('head')
<style>
    th { text-decoration: underline; }
</style>
@endsection

@section ('scripts')
    <script src="{{ asset('js/books.js') }}"></script>
@endsection