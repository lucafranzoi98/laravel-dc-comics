@extends('layouts.admin')

@section('title', 'Comics')

@section('content')
    <div class="container">
        <h6 class="my-4">Show all comics</h6>

        <a class="btn btn-primary" href="{{route('comics.create')}}">Add Comic</a>

        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Sale date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Artists</th>
                        <th scope="col">Writers</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->description }}</td>
                            {{-- <td><img src="{{ $comic->thumb }}" width="40"></td> --}}
                            <td><img src="{{ asset('storage/' . $comic->thumb) }}" width="40"></td>
                            <td>{{ $comic->price }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>{{ $comic->artists }}</td>
                            <td>{{ $comic->writers }}</td>
                            <td>
                              <a class="btn btn-primary mb-2" href="{{route('comics.show', $comic->id)}}">View</a>
                              <a class="btn btn-warning mb-2" href="{{route('comics.edit', $comic->id)}}">Edit</a>
                              Delete
                           </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
