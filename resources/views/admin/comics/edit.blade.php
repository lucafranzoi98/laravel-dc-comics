@extends('layouts.admin')

@section('title', 'Edit')

@section('content')
    <div class="container">
        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                    value="{{ $comic->title }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                    value="{{ $comic->price }}">
            </div>

            <div class="mb-3 d-flex">
                <img width="100" class="me-3" src="{{asset('storage/' . $comic->thumb)}}">
                <label for="thumb" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="thumb" id="thumb">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
