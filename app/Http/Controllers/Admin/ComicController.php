<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      return view('admin.comics.index', ['comics' => Comic::all()]);
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return view('admin.comics.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $file_path = null;
      if($request->has('thumb')){
         $file_path = Storage::put('comics_thumbs', $request->thumb);
      }
      
      $comic = new Comic();
      $comic->title = $request->title;
      $comic->price = $request->price;
      $comic->thumb = $file_path;
      $comic->save();

      return to_route('comics.index');
   }

   /**
    * Display the specified resource.
    */
   public function show(Comic $comic)
   {
      return view('admin.comics.show', compact('comic'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Comic $comic)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Comic $comic)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Comic $comic)
   {
      //
   }
}
