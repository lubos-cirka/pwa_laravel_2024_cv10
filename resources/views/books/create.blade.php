@extends('layouts.app')
@section('content')

<h3 class="mb-5">Adding a New Book</h3>

<div class="row">
    <div class="col-8">
        {{ Form::open(['route' => 'books.store']) }}

        {{ Form::label('title', 'Title') }}
        @if($errors->has('title'))
            @error('title')
                {{ Form::text('title', null, array('class' => 'form-control is-invalid', 'required' => 'required')) }}
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror
        @else
        {{ Form::text('title', null, array('class' => 'form-control mb-3', 'required' => 'required')) }}
        @endif

        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::label('genre', 'Genre') }}
        {{ Form::text('genre', null, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::label('author_id', 'Author') }}
        {{ Form::text('author_id', null, array('class' => 'form-control mb-3', 'required' => 'required')) }}

        {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
        
        {{ Form::close() }}
    </div>
</div>

@endsection