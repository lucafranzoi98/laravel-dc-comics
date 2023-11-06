@extends('layouts.admin')

@section('title', 'Edit')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                    value="{{ $comic->title }}" required maxlength="50">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                    value="{{ $comic->price }}">
            </div>

            <div class="mb-3 d-flex">
                @if (str_contains($comic->thumb, 'https://'))
                    <td><img src="{{ $comic->thumb }}" width="100"></td>
                @else
                    <td><img src="{{ asset('storage/' . $comic->thumb) }}" width="100"></td>
                @endif
                <label for="thumb" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="thumb" id="thumb">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
