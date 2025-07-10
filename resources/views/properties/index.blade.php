<!DOCTYPE html>
<html lang="fr"> 
<head>
    <title>Gestion des Types de Propriétés - Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Gestion des types de propriétés - Dashboard Admin">
    <meta name="author" content="Votre Entreprise">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

    <style>
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

        .stat-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            border-radius: 1rem;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .stat-card.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-card.success {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
        }

        .stat-card.info {
            background: linear-gradient(135deg, #3c8ce7 0%, #00eaff 100%);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .status-active {
            background-color: #d1edff;
            color: #0969da;
        }

        .status-inactive {
            background-color: #f1f3f4;
            color: #656d76;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #0969da;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0550ae;
            color: white;
            transform: translateY(-1px);
        }

        .btn-view {
            background-color: #17a2b8;
            color: white;
        }

        .btn-view:hover {
            background-color: #138496;
            color: white;
            transform: translateY(-1px);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
            color: white;
            transform: translateY(-1px);
        }

        .table-icon {
            font-size: 1.5rem;
            padding: 0.5rem;
            border-radius: 0.5rem;
            background-color: #f8f9fa;
            color: #495057;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 3rem;
            min-height: 3rem;
        }

        .search-filters {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #e9ecef;
        }

        .filter-section {
            display: flex;
            gap: 1rem;
            align-items: end;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .quick-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .table-container {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
        }

        .table-actions-header {
            background: #f8f9fa;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: between;
            align-items: center;
            gap: 1rem;
        }

        .bulk-actions {
            display: none;
            align-items: center;
            gap: 0.5rem;
        }

        .bulk-actions.show {
            display: flex;
        }

        .table-info {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6c757d;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .sort-indicator {
            opacity: 0.5;
            margin-left: 0.5rem;
        }

        .sort-indicator.active {
            opacity: 1;
        }

        .table th {
            cursor: pointer;
            user-select: none;
            position: relative;
        }

        .table th:hover {
            background-color: #f8f9fa;
        }

        .pagination-wrapper {
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: between;
            align-items: center;
        }
    </style>
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
            
            <!-- Breadcrumb Navigation -->
           
            

            <!-- Page Header -->
           <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">
            <i class="fas fa-home text-primary me-2"></i>
            Gestion des Propriétés
        </h1>
        <p class="text-muted mb-0">Gérez et organisez les différentes propriétés de votre système</p>
    </div>
    <div class="quick-actions">
        <a href="{{ route('properties.create') }}" class="btn app-btn-primary">
            <i class="fas fa-plus me-2"></i>Nouvelle propriété
        </a>
    </div>
 </div>

<!-- Statistiques -->
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card stat-card primary shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="app-card-stat-title text-white-50">Total Propriétés</div>
                        <div class="app-card-stat-value text-white">{{ $properties->count() }}</div>
                        <div class="text-white-50 small mt-1">
                            <i class="fas fa-arrow-up me-1"></i>+2 ce mois
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="app-card stat-card success shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="app-card-stat-title text-white-50">Disponibles</div>
                        <div class="app-card-stat-value text-white">{{ $properties->where('status', 'disponible')->count() }}</div>
                        <div class="text-white-50 small mt-1">
                            <i class="fas fa-check-circle me-1"></i>En ligne
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-icon">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="app-card stat-card warning shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="app-card-stat-title text-white-50">Vendus/Loués</div>
                        <div class="app-card-stat-value text-white">
                            {{ $properties->whereIn('status', ['vendu', 'loue'])->count() }}
                        </div>
                        <div class="text-white-50 small mt-1">
                            <i class="fas fa-check-double me-1"></i>Finalisés
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="app-card stat-card warning shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="app-card-stat-title text-white-50">En attente (Réservés)</div>
                        <div class="app-card-stat-value text-white">
                            {{ $properties->where('status', 'reserve')->count() }}
                        </div>
                        <div class="text-white-50 small mt-1">
                            <i class="fas fa-hourglass-half me-1"></i>Réservés
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Filtres et Recherche -->
            <div class="search-filters">
                <div class="filter-section">
                    <div class="filter-group">
                        <label for="searchInput" class="form-label">
                            <i class="fas fa-search text-primary me-1"></i>Rechercher
                        </label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Nom, description...">
                    </div>
                    <div class="filter-group">
                        <label for="statusFilter" class="form-label">
                            <i class="fas fa-filter text-primary me-1"></i>Statut
                        </label>
                        <select id="statusFilter" class="form-select">
                            <option value="">Tous les statuts</option>
                            <option value="active">Actifs</option>
                            <option value="inactive">Inactifs</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="iconFilter" class="form-label">
                            <i class="fas fa-icons text-primary me-1"></i>Icônes
                        </label>
                        <select id="iconFilter" class="form-select">
                            <option value="">Tous</option>
                            <option value="with">Avec icône</option>
                            <option value="without">Sans icône</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button type="button" class="btn app-btn-secondary" onclick="resetFilters()">
                            <i class="fas fa-undo me-2"></i>Réinitialiser
                        </button>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tableau Principal -->
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="table-container">
                    <div class="table-actions-header">
                        <div class="d-flex align-items-center">
                           
                            <div class="bulk-actions" id="bulkActions">
                                <span class="text-muted me-2">Actions groupées:</span>
                                <button class="btn btn-sm btn-outline-danger" onclick="bulkDelete()">
                                    <i class="fas fa-trash me-1"></i>Supprimer
                                </button>
                                <button class="btn btn-sm btn-outline-success" onclick="bulkActivate()">
                                    <i class="fas fa-toggle-on me-1"></i>Activer
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" onclick="bulkDeactivate()">
                                    <i class="fas fa-toggle-off me-1"></i>Désactiver
                                </button>
                            </div>
                        </div>
                        <div class="table-info">
                            <span id="totalCount">{{ $properties->count() }}</span> type(s) au total
                        </div>
                    </div>

                    <div class="table-responsive">
                       <table class="table app-table-hover mb-0 text-left" id="dataTable">
    <thead>
        <tr>
            <th class="cell" style="width: 50px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="headerCheck">
                </div>
            </th>
            <th class="cell"><i class="fas fa-tag text-primary me-2"></i>Titre</th>
            <th class="cell"><i class="fas fa-exchange-alt text-primary me-2"></i>Transaction</th>
            <th class="cell"><i class="fas fa-euro-sign text-primary me-2"></i>Prix</th>
            <th class="cell"><i class="fas fa-ruler-combined text-primary me-2"></i>Surface</th>
            <th class="cell"><i class="fas fa-map-marker-alt text-primary me-2"></i>Adresse</th>
            <th class="cell"><i class="fas fa-info-circle text-primary me-2"></i>Statut</th>
            <th class="cell"> <i class="fas fa-star text-primary me-2"></i>En Vedette</th>
            <th class="cell"><i class="fas fa-calendar text-primary me-2"></i>Créé le</th>
            <th class="cell text-center"><i class="fas fa-cogs text-primary me-2"></i>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($properties as $propertie)
            <tr data-id="{{ $propertie->id }}">
                <td>
                    <div class="form-check">
                        <input class="form-check-input row-checkbox" type="checkbox" value="{{ $propertie->id }}">
                    </div>
                </td>

                <td>{{ $propertie->title }}</td>
                <td>{{ ucfirst($propertie->transaction_type) }}</td>
                <td>{{ number_format($propertie->prix, 2, ',', ' ') }} F</td>
                <td>{{ $propertie->surface_habitable }} m²</td>
                <td>{{ $propertie->address }}</td>
                <td>
                    <span class="badge bg-{{ $propertie->status === 'disponible' ? 'success' : 'secondary' }}">
                        {{ ucfirst($propertie->status) }}
                    </span>
                </td>
                 <td>
                    <span class="badge bg-{{ $propertie->en_vedette == '1' ? 'success' : 'secondary' }}">
                        {{ $propertie->en_vedette == '1' ? 'Oui' : 'Non' }}
                    </span>
                </td>
                <td>
                    <div class="text-muted small">{{ $propertie->created_at->format('d/m/Y') }}</div>
                    <div class="text-muted smaller">{{ $propertie->created_at->format('H:i') }}</div>
                </td>
                <td class="text-center">
                    <div class="action-buttons d-flex justify-content-center gap-1">
                        <a href="{{ route('properties.edit', $propertie) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('properties.destroy', $propertie) }}" method="POST" onsubmit="return confirm('Supprimer cette propriété ?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">
                    <div class="empty-state text-center p-4">
                        <i class="fas fa-building fa-2x mb-2 text-muted"></i>
                        <h5 class="mb-1">Aucune propriété</h5>
                        <p class="text-muted">Commencez par créer votre première propriété.</p>
                        <a href="{{ route('properties.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus me-2"></i>Créer une propriété
                        </a>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

                    </div>

                    @if($properties->count() > 0)
                    <div class="pagination-wrapper">
                        <div class="text-muted">
                            Affichage de {{ $properties->count() }} résultat(s)
                        </div>
                        <div>
                            {{-- Pagination links here if using pagination --}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer le type de propriété <strong id="deleteItemName"></strong> ?</p>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Cette action est irréversible et pourrait affecter les propriétés liées.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Annuler
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer définitivement
                    </button>
                </form>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variables globales
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const iconFilter = document.getElementById('iconFilter');
    const tableBody = document.getElementById('tableBody');
    const selectAllCheckbox = document.getElementById('selectAll');
    const headerCheckbox = document.getElementById('headerCheck');
    const bulkActions = document.getElementById('bulkActions');
    const totalCount = document.getElementById('totalCount');
    
    let currentSort = { column: '', direction: 'asc' };
    let allRows = Array.from(tableBody.querySelectorAll('tr'));

    // Recherche en temps réel
    searchInput.addEventListener('input', function() {
        filterTable();
    });

    // Filtres
    statusFilter.addEventListener('change', filterTable);
    iconFilter.addEventListener('change', filterTable);

    // Fonction de filtrage
    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value;
        const iconValue = iconFilter.value;
        let visibleCount = 0;

        allRows.forEach(row => {
            if (row.querySelector('.empty-state')) {
                row.style.display = 'none';
                return;
            }

            const name = row.cells[1].textContent.toLowerCase();
            const description = row.cells[2].textContent.toLowerCase();
            const isActive = row.querySelector('.status-active') !== null;
            const hasIcon = row.cells[3].querySelector('i:not(.fa-minus)') !== null;

            let showRow = true;

            // Filtre de recherche
            if (searchTerm && !name.includes(searchTerm) && !description.includes(searchTerm)) {
                showRow = false;
            }

            // Filtre de statut
            if (statusValue === 'active' && !isActive) {
                showRow = false;
            } else if (statusValue === 'inactive' && isActive) {
                showRow = false;
            }

            // Filtre d'icône
            if (iconValue === 'with' && !hasIcon) {
                showRow = false;
            } else if (iconValue === 'without' && hasIcon) {
                showRow = false;
            }

            row.style.display = showRow ? '' : 'none';
            if (showRow) visibleCount++;
        });

        // Mettre à jour le compteur
        totalCount.textContent = visibleCount;

        // Afficher le message d'état vide si nécessaire
        if (visibleCount === 0 && !document.querySelector('.empty-state')) {
            const emptyRow = document.createElement('tr');
            emptyRow.innerHTML = `
                <td colspan="7">
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h5>Aucun résultat
    trouvé</h5>
                        <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
                    </div>                
                </td>
            `;
            tableBody.appendChild(emptyRow);
        } else if (visibleCount > 0 && document.querySelector('.empty-state')) {
            document.querySelector('.empty-state').remove();
        }
    }