<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

    @inertiaHead
    
  </head>
  <body>

    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('posts.create') }}">Navbar</a>
      </nav>

      <a class="navbar-brand" href="{{ route('posts.index') }}">index</a>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Inertia <Link> tag -->
        <Link class="navbar-brand" href="{{ route('posts.create') }}">Inertia Navbar</Link>
      </nav>


      <a href="{{ route('posts.create') }}">View Posts</a>



      @inertia


      

    </div>
    
  </body>
</html>