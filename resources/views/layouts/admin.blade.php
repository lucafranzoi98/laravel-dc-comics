<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @vite('resources/js/app.js')
   <title>Admin - @yield('title')</title>
</head>
<body class="bg-dark text-white">

   <header class="container mt-3">
      <nav class="nav navbar-dark bg-dark shadow-lg align-items-center">
         <h3>Admin</h3>
         <a class="nav-link" href="{{route('comics.index')}}">Comics</a>
      </nav>
   </header>

   <main>
      @yield('content')
   </main>

</body>
</html>