<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Modifier un Hadith - Daaray-Digital</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/amsify/amsify.suggestags.css')}}">
    
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

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success alert-dismissable m-3">
                    {{session('success')}}
                </div>
            @endif

            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h5 class="app-card-title">
                                <i class="fas fa-edit text-primary me-2"></i>
                                Modifier le Hadith
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('hadiths.index') }}" class="btn app-btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                            </a>
                        </div>
                    </div>
                </div>

                <div class="app-card-body p-4">
                    <form action="{{ route('hadiths.update', $hadith->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">
                                        <i class="fas fa-heading text-primary me-2"></i>Titre du Hadith
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ $hadith->title }}" 
                                           placeholder="Entrez le titre du hadith">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="content" class="form-label">
                                        <i class="fas fa-book text-primary me-2"></i>Contenu du Hadith
                                    </label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="3" 
                                              placeholder="Entrez le contenu du hadith">{{ $hadith->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="audio_file" class="form-label">
                                        <i class="fas fa-file-audio text-primary me-2"></i>Fichier Audio
                                    </label>
                                    @if($hadith->audio_url)
                                        <div class="mb-2">
                                            <audio controls class="w-100">
                                                <source src="{{asset('audios/'.$hadith->audio_url)}}" type="audio/mp3">
                                                Votre navigateur ne supporte pas l'élément audio.
                                            </audio>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('audio_url') is-invalid @enderror" 
                                           id="audio_file" name="audio_url" accept="audio/*">
                                    <small class="form-text text-muted">Formats acceptés: MP3, WAV, OGG</small>
                                    @error('audio_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categorie" class="form-label">
                                        <i class="fas fa-heading text-primary me-2"></i>Catégorie du Hadith
                                    </label>
                                    <input type="text" class="form-control @error('categorie') is-invalid @enderror" 
                                           id="title" name="title" value="{{ $hadith->categorie }}" 
                                           placeholder="Entrez le titre du hadith">
                                    @error('categorie')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn app-btn-primary">
                                <i class="fas fa-save me-2"></i>Mettre à jour le Hadith
                            </button>
                            <a href="{{ route('hadiths.index') }}" class="btn app-btn-secondary ms-2">
                                <i class="fas fa-times me-2"></i>Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->          
<script src="{{asset('assets/plugins/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  
<script src="{{asset('assets/amsify/jquery.amsify.suggestags.js')}}"></script>
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>

<!-- Charts JS -->
<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
<script src="{{asset('assets/js/index-charts.js')}}"></script> 

<!-- Page Specific JS -->
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html> 