@extends('layouts.app')
@section('content')

<h3 class="mb-5">Update of the Book: {{ $book->title }}</h3>

<div class="row">
    <div class="col-8">
        {{ Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'PUT']) }}

        {{ Form::label('title', 'Title') }}
        @if($errors->has('title'))
            @error('title')
                {{ Form::text('title', $book->title, array('class' => 'form-control is-invalid', 'required' => 'required')) }}
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror
        @else
            {{ Form::text('title', $book->title, array('class' => 'form-control mb-3', 'required' => 'required')) }}
        @endif

        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', $book->description, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::label('genre', 'Genre') }}
        {{ Form::text('genre', $book->genre, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::label('author_id', 'Author') }}
        {{ Form::text('author_id', $book->author_id, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>

@endsection