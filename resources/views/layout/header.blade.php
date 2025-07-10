<!DOCTYPE html>
<html lang="fr"> 
<head>
    <title>Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Daaray Digital">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
     <!-- FontAwesome JS-->
     <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
     {!! ToastMagic::styles() !!}
     <!-- App CSS -->  
     <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css')}}">
  </head>
  // Dans votre layout
@if(session('toast'))
<script>
    Swal.fire({
        icon: '{{ session('toast')['type'] }}',
        title: '{{ session('toast')['message'] }}',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
    <div class="app-header-inner">  
        <div class="container-fluid py-2">
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto d-flex align-items-center">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none me-3" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                        </a>
                        <a class="app-logo d-flex align-items-center" href="/dashboard">
                            {{-- <img class="logo-icon me-2" src="{{asset('assets/images/app-logo.svg')}}" alt="logo" style="height:32px;"> --}}
                            <span class="logo-text fw-bold" style="color:#15a362;font-size:1.25rem;">Tawfekh-Immo  {{ ucfirst(Auth::user()->role) }}</span>
                        </a>
                    </div><!--//col-->
                    <div class="app-utilities col-auto d-flex align-items-center">
                        <div class="app-utility-item me-3">
                            <a href="#" class="text-secondary position-relative">
                                <i class="fa-regular fa-bell fa-lg"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">3</span>
                            </a>
                        </div>
                        <div class="app-utility-item app-user-dropdown dropdown">
                            @auth
                            <a class="dropdown-toggle fw-bold text-dark" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <i class="fa-regular fa-user me-1"></i> {{ Auth::user()->name }}
                            </a>
                            @endauth
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i>Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </div><!--//app-user-dropdown--> 
                    </div><!--//app-utilities-->
                </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
    <!--//app-sidepanel-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
     {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-+0n0xVW2eSR5O4v6j8z9f1b6d7rSb8dYH7z3P9g7kA" crossorigin="anonymous"></script> --}}
   {!! ToastMagic::scripts() !!}
    </body>

</html>