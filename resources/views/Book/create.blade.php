@extends('layouts.master')

@section('title', 'New book')

@section('content')
    <h1>New book</h1>

    <form action="{{ action('BookController@store') }}" method="POST">

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <div class="form-group">
            <label for="title">Title:</label>
            <input id="title" name="title" type="text" class="form-control" />
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input id="author" name="author" type="text" class="form-control" />
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input id="isbn" name="isbn" type="text" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ action('BookController@index') }}" class="btn btn-dark" role="button">Back</a>
    </form>

    @if ($success !== null)
        @if ($success)
            <div class="alert alert-success">The book was stored successfully.</div>
        @else
            <div class="alert alert-danger">An error ocurred while the book was stored.</div>
        @endif
    @endif    

@endsection