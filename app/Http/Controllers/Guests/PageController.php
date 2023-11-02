<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
   function index(){
      return view('welcome');
   }

   function about(){
      return view('about');
   }
}
