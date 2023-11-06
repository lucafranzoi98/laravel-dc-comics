@extends('layouts.admin')

@section('title', 'Comics')

@section('content')
    <div class="container">
        <h6 class="my-4">Show all comics</h6>

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        <a class="btn btn-primary" href="{{ route('comics.create') }}">Add Comic</a>

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
                    @forelse ($comics as $comic)
                        <tr class="@if ($comic->trashed()) text-decoration-line-through @endif">
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}
                            </td>
                            <td>{{ $comic->description }}</td>

                            @if (str_contains($comic->thumb, 'https://'))
                                <td><img src="{{ $comic->thumb }}" width="40"></td>
                            @else
                                <td><img src="{{ asset('storage/' . $comic->thumb) }}" width="40"></td>
                            @endif

                            <td>${{ $comic->price }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>{{ $comic->artists }}</td>
                            <td>{{ $comic->writers }}</td>
                            <td>
                                <a class="btn btn-primary mb-2" href="{{ route('comics.show', $comic->id) }}">View</a>
                                <a class="btn btn-warning mb-2" href="{{ route('comics.edit', $comic->id) }}">Edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $comic->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade text-dark" id="modalId-{{ $comic->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $comic->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $comic->id }}">Comic id:
                                                    {{ $comic->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                This is a destructive operation, do you want to delete this comic?
                                                <div><strong>{{ $comic->title }}</strong></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    @empty
                        <p class="mt-3">No comics yet</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
