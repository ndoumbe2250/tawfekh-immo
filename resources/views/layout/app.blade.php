<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
    <title>Niata</title>
</head>

{{-- <div class="container-fluid sticky-top">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="container" style="background-color: rgb(217, 212, 217)">connexion</div>
</div>
<div class="col-md-1"></div>
</div>
</div> --}}
<div class="container-fluid sticky-top">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">

 
<nav class=" navbar navbar-expand-lg navbar-light   " style="background-color: rgb(255, 255, 255)">
  <div class="container-fluid">
    <a class="navbar-brand mr-4" href="#">Niata</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-black rounded-5 m-3 {{request()->is('/') ? 'active bg-primary text-white' : ''}}"   href="/">Acceuil</a>
        <a class="nav-link  text-black  rounded-5 m-3 {{request()->is('') ? 'active bg-primary text-white' : ''}}"  href="#">Produit</a>
        <a class="nav-link  text-black rounded-5 m-3 {{request()->is('/') ? 'active bg-primary text-white' : ''}}"  href="{{route('blog')}}">Actualite</a>
        <a class="nav-link  text-black rounded-5 m-3 {{request()->is('contact') ? 'active bg-primary text-white' : ''}}"  href="{{ route('contact') }}">Contact</a>
        <a class="nav-link  text-black rounded-5 m-3 {{request()->is('') ? 'active bg-primary text-white' : ''}}"  href="#">A propos</a>
        
        
      </div>
    </div>
  </div>
</nav>
</div>
<div class="col-md-1"></div>
</div>
</div>

    
    <body class="d-flex flex-column min-vh-100">
     <div class="container-fluid mb-5">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          @yield('content')
        </div>
        <div class="col-md-1"></div>

      </div>
      
      
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <footer class=" text-white"  >
        <div class="container-fluid"  >
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color: rgb(43, 41, 41);height: 10cm;">
              <div class="container py-3 mt-4" >
                <div class="row">
                  <div class="col-md-6 mt-5">
                    <h3>Contacter nous</h3>
                    <p>Email: contact@niata.com</p>
                    <p>Phone: +221 77 277 00 00</p>
                  </div>
                  <div class="col-md-6 mt-5">
                    <h3>Nous suivre</h3>
                    <ul class="list-inline">
                      <li class="list-inline-item"><a class="text-white" href="#"> Facebook</a></li>
                      <li class="list-inline-item"><a class="text-white" href="#">Twitter</a></li>
                      <li class="list-inline-item"><a class="text-white"  href="#">Instagram</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              {{-- <div class="container-fluid text-center py-2" style="background-color: rgb(43, 41, 41)">
                <p class="mb-0 text-white">© 2023 Niata. All rights reserved.</p>
              </div> --}}
          </div>
          <div class="col-md-1"></div>
        </div>
    </footer>
</body>



</html>