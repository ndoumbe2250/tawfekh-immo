<!DOCTYPE html>
<html lang="fr"> 
<head>
    @php
    $isEdit = isset($typeProperty);
@endphp
    <title>{{ $isEdit ? 'Modifier' : 'Ajouter' }} un type de propriété</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Gestion des types de propriétés - Dashboard Admin">
    <meta name="author" content="Votre Entreprise">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/amsify/amsify.suggestags.css')}}">
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
    
    <style>
        .form-floating {
            position: relative;
        }
        
        .form-floating > .form-control,
        .form-floating > .form-select {
            height: calc(3.5rem + 2px);
            line-height: 1.25;
            padding: 1rem 0.75rem;
        }
        
        .form-floating > label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            padding: 1rem 0.75rem;
            pointer-events: none;
            border: 1px solid transparent;
            transform-origin: 0 0;
            transition: opacity .1s ease-in-out,transform .1s ease-in-out;
        }
        
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label,
        .form-floating > .form-select ~ label {
            opacity: .65;
            transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
        }
        
        .icon-preview {
            font-size: 2rem;
            margin-left: 10px;
            color: var(--bs-primary);
        }
        
        .icon-input-group {
            display: flex;
            align-items: center;
        }
        
        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #d1edff;
            color: #0969da;
        }
        
        .status-inactive {
            background-color: #f1f3f4;
            color: #656d76;
        }
        
        .card-header-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .breadcrumb-nav {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        .breadcrumb-nav .breadcrumb {
            margin: 0;
        }
        
        .breadcrumb-nav .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        
        .breadcrumb-nav .breadcrumb-item.active {
            color: white;
        }
        
        .form-section {
            background: #f8f9fa;
            border-left: 4px solid var(--bs-primary);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        .form-section-title {
            margin-bottom: 1rem;
            color: var(--bs-primary);
            font-weight: 600;
        }
    </style>
</head> 

<body class="app">   	
<!--//app-header-->
<header class="app-header fixed-top">	
    @include('layout.header')
    @include('layout.sidebar')
</header>

@props(['typeProperty'])



<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
         

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Erreurs détectées :</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Main Form Card -->
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title mb-0">
                                <i class="fas fa-{{ $isEdit ? 'edit' : 'plus-circle' }} text-primary me-2"></i>
                                {{ $isEdit ? 'Modifier le type de propriété' : 'Ajouter un nouveau type de propriété' }}
                            </h4>
                            <p class="text-muted small mb-0 mt-1">
                                {{ $isEdit ? 'Modifiez les informations du type de propriété existant' : 'Créez un nouveau type de propriété pour votre système' }}
                            </p>
                        </div>
                        <div class="col-auto">
                            <div class="card-header-actions">
                                <a href="{{ route('type_properties.index') }}" class="btn app-btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                                </a>
                                @if($isEdit)
                                    <a href="{{ route('type_properties.show', $typeProperty) }}" class="btn app-btn-info">
                                        <i class="fas fa-eye me-2"></i>Voir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-card-body p-4">
  <form 
    action="{{ route('images.store') }}" 
    method="POST" 
    enctype="multipart/form-data" 
    id="imageBienForm"
>
    @csrf

    <div class="form-section">
        <h5 class="form-section-title">
            <i class="fas fa-image me-2"></i>Images du bien
        </h5>
        <div class="row g-4">

            <!-- Upload multiple -->
            <div class="col-md-6">
                <label for="image_path" class="form-label">
                    <i class="fas fa-upload text-primary me-2"></i>Fichiers image *
                </label>
                <input 
                    type="file" 
                    class="form-control @error('image_path.*') is-invalid @enderror" 
                    id="image_path" 
                    name="image_path[]" 
                    multiple 
                    required
                />
                @error('image_path.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Propriété liée -->
            <div class="col-md-6">
                <label for="property_id" class="form-label">
                    <i class="fas fa-building text-primary me-2"></i>Propriété associée *
                </label>
                <select 
                    class="form-select @error('property_id') is-invalid @enderror" 
                    id="property_id" 
                    name="property_id" 
                    required
                >
                    <option value="">-- Sélectionner une propriété --</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
                @error('property_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image principale (optionnelle) -->
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="is_main" 
                        name="is_main" 
                        value="1"
                    />
                    <label class="form-check-label" for="is_main">
                        <i class="fas fa-star text-primary me-2"></i>Définir la première image comme principale
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
        <div class="text-muted small">
            <i class="fas fa-info-circle me-1"></i>Plusieurs fichiers peuvent être sélectionnés à la fois.
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('images.index') }}" class="btn app-btn-secondary">
                <i class="fas fa-times me-2"></i>Annuler
            </a>
            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>Réinitialiser
            </button>
            <button type="submit" class="btn app-btn-primary">
                <i class="fas fa-save me-2"></i>Ajouter les images
            </button>
        </div>
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

<!-- Charts JS -->
<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
<script src="{{asset('assets/js/index-charts.js')}}"></script> 

<!-- Page Specific JS -->
<script src="{{asset('assets/js/app.js')}}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Icon preview functionality
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    
    iconInput.addEventListener('input', function() {
        const iconClass = this.value || 'fas fa-building';
        iconPreview.innerHTML = `<i class="${iconClass}"></i>`;
    });
    
    // Color picker sync
    const colorPicker = document.getElementById('color');
    const colorText = document.getElementById('colorText');
    
    colorPicker.addEventListener('change', function() {
        colorText.value = this.value;
    });
    
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        if (!slugInput.value || slugInput.dataset.autoGenerated) {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });
    
    slugInput.addEventListener('input', function() {
        if (this.value) {
            delete this.dataset.autoGenerated;
        }
    });
    
    // Form validation
    const form = document.getElementById('propertyTypeForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Enregistrement...';
    });
    
    // Reset form validation on reset
    form.addEventListener('reset', function() {
        setTimeout(() => {
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            const feedbacks = form.querySelectorAll('.invalid-feedback');
            feedbacks.forEach(feedback => {
                feedback.style.display = 'none';
            });
        }, 10);
    });
});
</script>
</body>
</html>