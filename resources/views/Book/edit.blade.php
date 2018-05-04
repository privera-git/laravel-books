@extends('layouts.master')

@section('title', 'Edit book')

@section('content')

    <h1>Edit book</h1>

    <form action="{{ action('BookController@update', $book->id) }}" method="POST">
        @method('PUT')

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <div class="form-group">
            <label for="title">Title:</label>
            <input id="title" name="title" type="text" class="form-control" 
                value="{{ $book->title }}" />
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input id="author" name="author" type="text" class="form-control" 
                value="{{ $book->author }}" />
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input id="isbn" name="isbn" type="text" class="form-control"
                value="{{ $book->isbn }}" />
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ action('BookController@index') }}" role="button" class="btn btn-dark">Back</a>
    </form>

    @if(isset($success))
        @if($success)
            <div class="alert alert-success">The book was updated successfully.</div>
        @else
            <div class="alert alert-danger">An error ocurred while the book was updated.</div>
        @endif
    @endif

    @endsection