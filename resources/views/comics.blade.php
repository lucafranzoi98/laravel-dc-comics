@extends('layouts.app');

@section('title', 'Comics')

@section('content')

<div class="container">
   <div class="row row-cols-4 g-4">
      @foreach ($comics as $comic)
      <div class="col">
         <div class="card h-100">
           <img src="{{$comic->thumb}}" class="card-img-top">
           <div class="card-body">
             <h5 class="card-title">{{$comic->title}}</h5>
             <h6 class="card-subtitle mb-2 text-muted ">{{$comic->price}}</h6>
             <p class="card-text">{{$comic->sale_date}}</p>
           </div>
         </div>
      </div>
      @endforeach

   </div>
</div>
    
@endsection