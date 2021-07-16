@extends('home')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Brand</th>
                <th scope="col">Types</th>
            </tr>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->types }}</td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
@endsection