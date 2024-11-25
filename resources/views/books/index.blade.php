@extends('layouts.app')
@section('content')

<h3 class="mb-5">List of Books</h3>

<p><a href="{{ route('books.create') }}" class="btn btn-secondary">Add New Book</a></p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>genre</th>
            <th>author</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->title }}</td>
            <td>{{ $d->description }}</td>
            <td>{{ $d->genre }}</td>
            <td>{!! $d->author->full_name ?? '' !!}</td>
            <td><a class="btn btn-info" href="{{ route('books.edit', $d->id) }}">Edit</a></td>
            <td>
                {!! Form::open(array('route' => ['books.destroy', $d->id], 'method'=>'DELETE')) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("You are about to delete the book.")')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>    
</table>

@endsection