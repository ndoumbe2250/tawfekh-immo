<!DOCTYPE html>
<html lang="fr"> 
<head>
    <title>Gestion des Images de Propriétés - Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Gestion des images de propriétés - Dashboard Admin">
    <meta name="author" content="Votre Entreprise">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            --info-gradient: linear-gradient(135deg, #3c8ce7 0%, #00eaff 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --shadow-hover: 0 15px 35px rgba(0,0,0,0.1);
            --border-radius: 1rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .breadcrumb-nav {
            background: var(--primary-gradient);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
        }
        
        .breadcrumb-nav::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .breadcrumb-nav .breadcrumb {
            margin: 0;
            position: relative;
            z-index: 1;
        }
        
        .breadcrumb-nav .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }
        
        .breadcrumb-nav .breadcrumb-item a:hover {
            color: white;
            transform: translateX(3px);
        }
        
        .breadcrumb-nav .breadcrumb-item.active {
            color: white;
            font-weight: 600;
        }

        .stat-card {
            border: none;
            border-radius: var(--border-radius);
            color: white;
            transition: var(--transition);
            overflow: hidden;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 50%, rgba(0,0,0,0.1) 100%);
            pointer-events: none;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-hover);
        }

        .stat-card.primary {
            background: var(--primary-gradient);
        }

        .stat-card.success {
            background: var(--success-gradient);
        }

        .stat-card.info {
            background: var(--info-gradient);
        }

        .stat-card.warning {
            background: var(--warning-gradient);
        }

        .stat-icon {
            font-size: 3rem;
            opacity: 0.9;
            transition: var(--transition);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .status-active {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .status-inactive {
            background: linear-gradient(135deg, #64748b, #94a3b8);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }

        .status-main {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .status-badge:hover {
            transform: scale(1.05);
        }

        .property-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 1rem;
            border: 3px solid #f1f5f9;
            transition: var(--transition);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .property-image:hover {
            transform: scale(1.15) rotate(2deg);
            border-color: #3b82f6;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .search-filters {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .search-filters::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .filter-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }

        .filter-group label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.75rem;
            display: block;
        }

        .form-control, .form-select {
            border-radius: 0.75rem;
            border: 2px solid #e5e7eb;
            transition: var(--transition);
            padding: 0.75rem 1rem;
            font-weight: 500;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .table-container {
            position: relative;
            overflow: hidden;
            border-radius: var(--border-radius);
            background: white;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .table-actions-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1.5rem 2rem;
            border-bottom: 2px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .bulk-actions {
            display: none;
            align-items: center;
            gap: 0.75rem;
            animation: slideIn 0.3s ease;
        }

        .bulk-actions.show {
            display: flex;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .table-info {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            border: 2px solid #e2e8f0;
        }

        .table th {
            cursor: pointer;
            user-select: none;
            position: relative;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 3px solid #e2e8f0;
            font-weight: 700;
            color: #374151;
            padding: 1.25rem 1rem;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        .table th:hover {
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            transform: translateY(-1px);
        }

        .table td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 500;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: center;
        }

        .btn-action {
            padding: 0.6rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            position: relative;
            overflow: hidden;
        }

        .btn-action::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            transition: var(--transition);
            transform: translate(-50%, -50%);
        }

        .btn-action:hover::before {
            width: 100px;
            height: 100px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-view {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            color: white;
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .btn-view:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .sort-indicator {
            opacity: 0.5;
            margin-left: 0.5rem;
            transition: var(--transition);
        }

        .sort-indicator.active {
            opacity: 1;
            color: #3b82f6;
            transform: scale(1.2);
        }

        .pagination-wrapper {
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-top: 2px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .empty-state-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .page-title {
            color: #1f2937;
            font-weight: 800;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .page-subtitle {
            color: #6b7280;
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        .quick-actions .btn {
            border-radius: 0.75rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-outline-primary {
            border: 2px solid #3b82f6;
            color: #3b82f6;
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .alert {
            border-radius: var(--border-radius);
            border: none;
            font-weight: 500;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        /* Property title styling */
        .property-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .property-id {
            font-size: 0.85rem;
            color: #6b7280;
            font-weight: 500;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .filter-section {
                grid-template-columns: 1fr;
            }
            
            .table-actions-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .action-buttons {
                flex-direction: row;
                flex-wrap: wrap;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .stat-card {
                margin-bottom: 1rem;
            }
        }

        /* Animation for loading states */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            <div class="breadcrumb-nav">
                <div class="container-xl">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <i class="fas fa-home me-1"></i>Accueil
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Propriétés</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Gestion des Images
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Page Header -->
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title">
                            <i class="fas fa-images text-primary me-2"></i>
                            Gestion des Images
                        </h1>
                        <p class="page-subtitle">Gérez et organisez les images de vos propriétés immobilières</p>
                    </div>
                    <div class="quick-actions">
                        <button class="btn btn-outline-primary" onclick="exportData()">
                            <i class="fas fa-download me-2"></i>Exporter
                        </button>
                        <a href="{{ route('images.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Nouvelle Image
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card stat-card primary shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title text-white-50">Total Images</div>
                                    <div class="app-card-stat-value text-white">{{ $images->count() }}</div>
                                    <div class="text-white-50 small mt-1">
                                        <i class="fas fa-arrow-up me-1"></i>+{{ $images->where('created_at', '>=', now()->startOfMonth())->count() }} ce mois
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon">
                                        <i class="fas fa-images"></i>
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
                                    <div class="app-card-stat-title text-white-50">Images Principales</div>
                                    <div class="app-card-stat-value text-white">{{ $images->where('is_main', true)->count() }}</div>
                                    <div class="text-white-50 small mt-1">
                                        <i class="fas fa-star me-1"></i>Mises en avant
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3">
                    <div class="app-card stat-card info shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="app-card-stat-title text-white-50">Propriétés Avec Images</div>
                                    <div class="app-card-stat-value text-white">{{ $images->groupBy('property_id')->count() }}</div>
                                    <div class="text-white-50 small mt-1">
                                        <i class="fas fa-building me-1"></i>Propriétés
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon">
                                        <i class="fas fa-building"></i>
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
                                    <div class="app-card-stat-title text-white-50">Images Secondaires</div>
                                    <div class="app-card-stat-value text-white">{{ $images->where('is_main', false)->count() }}</div>
                                    <div class="text-white-50 small mt-1">
                                        <i class="fas fa-images me-1"></i>Galeries
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-icon">
                                        <i class="fas fa-layer-group"></i>
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
                        <input type="text" id="searchInput" class="form-control" placeholder="Nom de propriété, ID...">
                    </div>
                    <div class="filter-group">
                        <label for="statusFilter" class="form-label">
                            <i class="fas fa-filter text-primary me-1"></i>Type d'Image
                        </label>
                        <select id="statusFilter" class="form-select">
                            <option value="">Tous les types</option>
                            <option value="main">Images principales</option>
                            <option value="secondary">Images secondaires</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="dateFilter" class="form-label">
                            <i class="fas fa-calendar text-primary me-1"></i>Période
                        </label>
                        <select id="dateFilter" class="form-select">
                            <option value="">Toutes les périodes</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                            <option value="year">Cette année</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button type="button" class="btn btn-outline-secondary" onclick="resetFilters()">
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
                                <button class="btn btn-sm btn-outline-warning" onclick="bulkSetMain()">
                                    <i class="fas fa-star me-1"></i>Définir comme principale
                                </button>
                            </div>
                        </div>
                        <div class="table-info">
                            <span id="totalCount">{{ $images->count() }}</span> image(s) au total
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
                                    <th class="cell" data-sort="id">
                                        <i class="fas fa-hashtag text-primary me-2"></i>ID
                                        <i class="fas fa-sort sort-indicator"></i>
                                    </th>
                                    <th class="cell" data-sort="property">
                                        <i class="fas fa-building text-primary me-2"></i>Propriété
                                        <i class="fas fa-sort sort-indicator"></i>
                                    </th>
                                    <th class="cell text-center">
                                        <i class="fas fa-image text-primary me-2"></i>Image
                                    </th>
                                    <th class="cell text-center" data-sort="is_main">
                                        <i class="fas fa-star text-primary me-2"></i>Statut
                                        <i class="fas fa-sort sort-indicator"></i>
                                    </th>
                                    <th class="cell text-center" data-sort="created_at">
                                        <i class="fas fa-calendar text-primary me-2"></i>Créé le
                                        <i class="fas fa-sort sort-indicator"></i>
                                    </th>
                                    <th class="cell text-center">
                                        <i class="fas fa-cogs text-primary me-2"></i>Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($images as $image)
                                    <tr data-id="{{ $image->id }}" class="fade-in">
                                        <td class="cell">
                                            <div class="form-check">
                                                <input class="form-check-input bulk-checkbox" type="checkbox" value="{{ $image->id }}">
                                            </div>
                                        </td>
                                        <td class="cell">
                                            <span class="badge bg-primary text-white">
                                                {{ $image->id }}
                                            </span>
                                        </td>
                                        <td class="cell">
                                            <span class="badge bg-success text-white">
                                                {{ $image->property->title ?? 'Propriété supprimée' }}
                                            </span>
                                        </td>
                                        <td class="cell text-center">
                                            <img src="{{ asset('biens/' . $image->image_path) }}" alt="Image" style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td class="cell text-center">
                                            <span class="badge bg-{{ $image->is_main ? 'success' : 'secondary' }}">
                                                {{ $image->is_main ? 'Principale' : 'Secondaire' }}
                                            </span>
                                        </td>
                                        <td class="cell text-center">
                                            {{ $image->created_at->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td class="cell text-center">
                                            <a class="btn app-btn-primary" href="{{ route('images.show', $image->id) }}">
                                                <i class="fas fa-eye me-1"></i>
                                            </a>
                                            <a class="btn app-btn-secondary" href="{{ route('images.edit', $image->id) }}">
                                                <i class="fas fa-edit me-1"></i>
                                            </a>
                                            <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">
                                                    <i class="fas fa-trash me-1 text-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>                                    
                                @empty                                    
                                    <tr>
                                        <td colspan="7" class="text-center empty-state">
                                            <i class="fas fa-images empty-state-icon"></i>
                                            <p class="mt-3">Aucune image trouvée pour le moment.</p>
                                        </td>
                                    </tr>
                                @endforelse 
                            </tbody>                            
                        </table>                        
                    </div>                    

                    {{-- <div class="table-actions-footer">
                        <div class="pagination-wrapper">
                            <nav aria-label="Page navigation">
                                {{ $images->links('vendor.pagination.bootstrap-5') }}
                            </nav>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>  