@extends('layouts.app')
@section('content')

<h3 class="mb-5">List of Authors</h3>
            
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>firstname</th>
            <th>lastname</th>
        </tr>
    </thead>
    </tbody>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->firstname }}</td>
            <td>{{ $author->lastname }}</td>
        </tr>
        @endforeach
    </tbody>    
</table>

@endsection