<!DOCTYPE html>
<html lang="fr"> 
<head>
    @php
    $isEdit = isset($property);
@endphp
    <title>{{ $isEdit ? 'Modifier' : 'Ajouter' }}  de propriété</title>
    
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
                                <a href="{{ route('properties.index') }}" class="btn app-btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                                </a>
                                @if($isEdit)
                                    <a href="{{ route('properties.show', $property) }}" class="btn app-btn-info">
                                        <i class="fas fa-eye me-2"></i>Voir
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-card-body p-4">
         <form action="{{ $isEdit ? route('properties.update', $property) : route('properties.store') }}" method="POST">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <!-- Informations générales -->
    <div class="form-section">
        <h5 class="form-section-title">
            <i class="fas fa-home me-2"></i>Informations générales
        </h5>
        <div class="row g-4">

            <!-- Titre -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Titre" value="{{ old('title', $property->title ?? '') }}" required>
                    <label for="title"><i class="fas fa-heading me-2 text-primary"></i>Titre *</label>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Type de transaction -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select name="transaction_type" id="transaction_type" class="form-select @error('transaction_type') is-invalid @enderror" required>
                        <option value="">-- Choisir --</option>
                        <option value="vente" {{ old('transaction_type', $property->transaction_type ?? '') == 'vente' ? 'selected' : '' }}>Vente</option>
                        <option value="location" {{ old('transaction_type', $property->transaction_type ?? '') == 'location' ? 'selected' : '' }}>Location</option>
                    </select>
                    <label for="transaction_type"><i class="fas fa-exchange-alt text-primary me-2"></i>Type de transaction *</label>
                    @error('transaction_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Prix -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="number" name="prix" id="prix" step="0.01" class="form-control @error('prix') is-invalid @enderror"
                        placeholder="Prix" value="{{ old('prix', $property->prix ?? '') }}" required>
                    <label for="prix"><i class="fas fa-euro-sign text-primary me-2"></i>Prix *</label>
                    @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Surface -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="number" name="surface_habitable" id="surface_habitable" step="0.01"
                        class="form-control @error('surface_habitable') is-invalid @enderror"
                        placeholder="Surface habitable"
                        value="{{ old('surface_habitable', $property->surface_habitable ?? '') }}" required>
                    <label for="surface_habitable"><i class="fas fa-ruler-combined text-primary me-2"></i>Surface habitable (m²) *</label>
                    @error('surface_habitable') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Adresse -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                        placeholder="Adresse" value="{{ old('address', $property->address ?? '') }}" required>
                    <label for="address"><i class="fas fa-map-marker-alt text-primary me-2"></i>Adresse *</label>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-3">
    
        
        <div class="form-floating">
                    <input type="number" name="nb_chambres" id="nb_chambres" class="form-control @error('nb_chambres') is-invalid @enderror"
               placeholder="Nombre de chambres" value="{{ old('nb_chambres', $property->nb_chambres ?? '') }}" required>
                    <label for="address"><i class="fas fa-bed text-primary me-2"></i>Nombre de chambres  *</label>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
       
          
        @error('nb_chambres') 
            <div class="invalid-feedback d-block">{{ $message }}</div> 
        @enderror
  
</div>
         <div class="col-md-3">
    
        
        <div class="form-floating">
                    <input type="number" name="nb_salles_bain" id="nb_salles_bain" class="form-control @error('nb_salles_bain') is-invalid @enderror"
               placeholder="Nombre de salles de bain" value="{{ old('nb_salles_bain', $property->nb_salles_bain ?? '') }}" required>
                    <label for="address"><i class="fas fa-bath text-primary me-2"></i>Nombre de salles de bain  *</label>
                    @error('nb_salles_bain') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
       
          
        @error('nb_chambres') 
            <div class="invalid-feedback d-block">{{ $message }}</div> 
        @enderror
  
</div>
         <div class="col-md-6">
    <div class="form-check form-switch">
        <input type="checkbox" 
               name="en_vedette" 
               id="en_vedette" 
               class="form-check-input @error('en_vedette') is-invalid @enderror"
               value="1"
               {{ old('en_vedette', $property->en_vedette ?? false) ? 'checked' : '' }}>
        <label class="form-check-label d-flex align-items-center" for="en_vedette">
           
            <i class="fas fa-star text-primary me-2"></i>
            <span>Mettre en vedette</span>
        </label>
        @error('en_vedette') 
            <div class="invalid-feedback d-block">{{ $message }}</div> 
        @enderror
    </div>
</div>
  <div class="col-md-6">
    <div class="form-check form-switch">
        <input type="checkbox" 
               name="is_active" 
               id="is_active" 
               class="form-check-input @error('is_active') is-invalid @enderror"
               value="1"
               {{ old('is_active', $property->en_vedette ?? false) ? 'checked' : '' }}>
        <label class="form-check-label d-flex align-items-center" for="en_vedette">
           
            <i class="fas fa-check text-primary me-2"></i>
            <span>Publier</span>
        </label>
        @error('en_vedette') 
            <div class="invalid-feedback d-block">{{ $message }}</div> 
        @enderror
    </div>
</div>
        </div>
    </div>

    <!-- Association -->
    <div class="form-section mt-4">
        <h5 class="form-section-title">
            <i class="fas fa-user-tie me-2"></i>Attributions
        </h5>
        <div class="row g-4">
            <!-- Type de propriété -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select name="type_properties_id" id="type_properties_id" class="form-select @error('type_properties_id') is-invalid @enderror" required>
                        <option value="">-- Choisir un type --</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_properties_id', $property->type_properties_id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="type_properties_id"><i class="fas fa-building text-primary me-2"></i>Type de propriété *</label>
                    @error('type_properties_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Agent -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                        <option value="">-- Sélectionner un agent --</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}" {{ old('user_id', $property->user_id ?? '') == $agent->id ? 'selected' : '' }}>
                                {{ $agent->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="user_id"><i class="fas fa-user text-primary me-2"></i>Agent responsable *</label>
                    @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Statut -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="disponible" {{ old('status', $property->status ?? '') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="vendu" {{ old('status', $property->status ?? '') == 'vendu' ? 'selected' : '' }}>Vendu</option>
                        <option value="loue" {{ old('status', $property->status ?? '') == 'loue' ? 'selected' : '' }}>Loué</option>
                        <option value="reserve" {{ old('status', $property->status ?? '') == 'reserve' ? 'selected' : '' }}>Réservé</option>
                    </select>
                    <label for="status"><i class="fas fa-info-circle text-primary me-2"></i>Statut *</label>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </div>
<div class="form-section mt-4">
        <h5 class="form-section-title">
            <i class="fas fa-note-sticky me-2"></i>Description
        </h5>
        <div class="row g-4">
            <!-- description -->
            <div class="col-md-12">
                <div class="form-floating">
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description" rows="4">{{ old('description', $property->description ?? '') }}</textarea>
                    <label for="description"><i class="fas fa-note-sticky text-primary me-2"></i>Description *</label>
                    @error('type_properties_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
</div>    
    <!-- Boutons -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
        <div class="text-muted small">
            <i class="fas fa-info-circle me-1"></i>Les champs marqués d'un astérisque (*) sont obligatoires
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('properties.index') }}" class="btn btn-secondary">
                <i class="fas fa-times me-2"></i>Annuler
            </a>
            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>Réinitialiser
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>{{ $isEdit ? 'Mettre à jour' : 'Enregistrer' }}
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