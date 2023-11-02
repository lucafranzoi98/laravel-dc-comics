@extends('layouts.admin')

@section('title', 'Show')

@section('content')
    <div class="container">
        <h6 class="my-4">Show comic id: {{ $comic->id }}</h6>

        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Sale date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Artists</th>
                        <th scope="col">Writers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->description }}</td>
                        @if (str_contains($comic->thumb, 'https://'))
                            <td><img src="{{ $comic->thumb }}" width="40"></td>
                        @else
                            <td><img src="{{ asset('storage/' . $comic->thumb) }}" width="40"></td>
                        @endif
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->type }}</td>
                        <td>{{ $comic->artists }}</td>
                        <td>{{ $comic->writers }}</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
