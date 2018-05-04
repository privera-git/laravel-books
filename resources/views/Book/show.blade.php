@extends('layouts.master')

@section('title', 'Book details')

@section('content')

    <h1>Book details</h1>

    @if (isset($book))
        <div class="form-group">
            <label for="title">Title:</label>
            <span class="form-control" readonly>{{ $book->title }}</span>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <span class="form-control" readonly>{{ $book->author }}</span>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <span class="form-control" readonly>{{ $book->isbn }}</span>
        </div>

        <a href="{{ action('BookController@edit', $book->id) }}" role="button" class="btn btn-primary">Edit</a>
    @else
        <p>The requested book does not exist.</p>
    @endif

    <a href="{{ action('BookController@index') }}" role="button" class="btn btn-dark">Back</a>

@endsection