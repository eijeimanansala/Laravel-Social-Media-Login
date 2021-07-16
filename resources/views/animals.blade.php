@extends('home')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Types</th>
            </tr>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <th scope="row">{{ $animal->id }}</th>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->types }}</td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
@endsection