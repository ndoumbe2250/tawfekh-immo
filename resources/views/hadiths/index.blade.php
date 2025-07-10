<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Hadiths</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

</head> 

<body class="app">   	
<!--//app-header-->
<header class="app-header fixed-top">	
    @include('layout.header')
    @include('layout.sidebar')
</header>
<!-- @include('layout.content') -->

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <!-- Statistiques -->
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title">Total Hadiths</div>
                                    <div class="app-card-stat-value">{{ count($hadiths) }}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon bg-primary text-white">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title">Hadiths Audio</div>
                                    <div class="app-card-stat-value">{{ $hadiths->whereNotNull('audio_url')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon bg-success text-white">
                                        <i class="fas fa-headphones"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title">Hadiths Récents</div>
                                    <div class="app-card-stat-value">{{ $hadiths->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon bg-info text-white">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title">Hadiths Populaires</div>
                                    <div class="app-card-stat-value">25</div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon bg-warning text-white">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                @if (session('success'))
                <div class="alert alert-success alert-dismissable m-3">
                    {{session('success')}}
                </div>
                @endif

                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h5 class="app-card-title">Liste des Hadiths</h5>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('hadiths.create') }}" class="btn app-btn-primary">
                                    <i class="fas fa-plus me-2"></i>Ajouter un Hadith
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Titre</th>
                                        <th class="cell">Contenu</th>
                                        <th class="cell">Categorie</th>
                                        <th class="cell">Audio</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hadiths as $hadith)
                                    <tr>
                                        <td class="cell">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-book-open text-primary me-2"></i>
                                                {{ $hadith->title }}
                                            </div>
                                        </td>
                                        <td class="cell">
                                            <div class="text-truncate" style="max-width: 300px;">
                                                {{ $hadith->content }}
                                            </div>
                                        </td>
                                        <td class="cell">
                                            <div class="text-truncate" style="max-width: 300px;">
                                                {{ $hadith->categorie ? $hadith->categorie : 'Non spécifié' }}
                                            </div>
                                        </td>
                                        <td class="cell">
                                            @if($hadith->audio_url)
                                            <audio controls class="w-100">
                                                <source src="{{asset('audios/'.$hadith->audio_url)}}" type="audio/mp3">
                                                Votre navigateur ne supporte pas l'élément audio.
                                            </audio>
                                            @else
                                            <span class="badge bg-secondary">Pas d'audio</span>
                                            @endif
                                        </td>
                                        <td class="cell">
                                            <div class="btn-group">
                                                <a class="btn app-btn-secondary" href="{{ route('hadiths.edit', $hadith->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form class="d-inline" action="{{ route('hadiths.destroy', $hadith->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn app-btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce hadith ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->          
<script src="{{asset('assets/plugins/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

<!-- Charts JS -->
<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
<script src="{{asset('assets/js/index-charts.js')}}"></script> 

<!-- Page Specific JS -->
<script src="{{asset('assets/js/app.js')}}"></script> 
</body>
</html> 

