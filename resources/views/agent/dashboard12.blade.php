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
    
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css')}}">
    
    <style>
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }
        
        .stats-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .stats-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }
        
        .card-gradient-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        
        .card-gradient-info {
            background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
        }
        
        .card-gradient-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        }
        
        .card-gradient-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        }
        
        .card-gradient-dark {
            background: linear-gradient(135deg, #343a40 0%, #212529 100%);
        }
        
        .card-gradient-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 15px;
        }
        
        .table-modern {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 20px;
        }
        
        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .chart-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
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

<div class="container-fluid py-4">
    <!-- Header Dashboard -->
    <div class="dashboard-header text-center">
        <h1 class="mb-2"><i class="fas fa-chart-line me-3"></i>Tableau de bord</h1>
        <p class="mb-0">Vue d'ensemble de votre activité immobilière</p>
    </div>

    <!-- Statistiques principales -->
    <div class="row g-4 mb-5">
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-success">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-home"></i>
                    </div>
                    <h5 class="card-title">Biens disponibles</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $disponibles }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-info">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="card-title">Demandes en attente</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $contactsEnAttente }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-warning">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5 class="card-title">Visites à venir</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $visitesAVenir }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-secondary">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="card-title">Favoris enregistrés</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $totalFavoris }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-dark">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="card-title">Agents inscrits</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $agents }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="card stats-card text-white card-gradient-primary">
                <div class="card-body text-center">
                    <div class="stats-icon mb-2">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h5 class="card-title">Types de biens actifs</h5>
                    <p class="fs-2 fw-bold mb-0">{{ $typesActifs }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="card chart-card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-pie me-2"></i>Répartition des biens par statut</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card chart-card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>Évolution des demandes</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="demandesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-8">
            <div class="card chart-card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-line me-2"></i>Activité mensuelle</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="activiteChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card chart-card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-doughnut me-2"></i>Types de transactions</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="transactionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers biens -->
    <div class="mb-5">
        <h3 class="section-title">Derniers biens ajoutés</h3>
        <div class="card table-modern">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-tag me-2"></i>Titre</th>
                                <th><i class="fas fa-building me-2"></i>Type</th>
                                <th><i class="fas fa-exchange-alt me-2"></i>Transaction</th>
                                <th><i class="fas fa-euro-sign me-2"></i>Prix</th>
                                <th><i class="fas fa-info-circle me-2"></i>Statut</th>
                                <th><i class="fas fa-cogs me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastProperties as $property)
                            <tr>
                                <td><strong>{{ $property->title }}</strong></td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $property->typeProperty->name }}</span>
                                </td>
                                <td>{{ ucfirst($property->transaction_type) }}</td>
                                <td><strong>{{ number_format($property->prix, 0, ',', ' ') }} €</strong></td>
                                <td>
                                    <span class="badge bg-{{ $property->status == 'disponible' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i>Voir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Dernières demandes -->
    <div class="mb-5">
        <h3 class="section-title">Demandes de contact récentes</h3>
        <div class="card table-modern">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th><i class="fas fa-user me-2"></i>Nom</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-list me-2"></i>Type</th>
                                <th><i class="fas fa-home me-2"></i>Bien</th>
                                <th><i class="fas fa-flag me-2"></i>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastContacts as $contact)
                            <tr>
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ ucfirst($contact->type_demande) }}</span>
                                </td>
                                <td>
                                    @if($contact->property)
                                        <a href="{{ route('properties.show', $contact->property->id) }}" class="text-decoration-none">
                                            {{ $contact->property->title }}
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $contact->status == 'en_attente' ? 'warning' : 'secondary' }}">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Prochaines visites -->
    <div class="mb-5">
        <h3 class="section-title">Prochaines visites programmées</h3>
        <div class="card table-modern">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th><i class="fas fa-user-tie me-2"></i>Nom du visiteur</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-phone me-2"></i>Téléphone</th>
                                <th><i class="fas fa-calendar me-2"></i>Date</th>
                                <th><i class="fas fa-building me-2"></i>Bien</th>
                                <th><i class="fas fa-check-circle me-2"></i>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nextVisites as $visite)
                            <tr>
                                <td><strong>{{ $visite->visitor_name }}</strong></td>
                                <td>{{ $visite->visitor_email }}</td>
                                <td>{{ $visite->visitor_phone }}</td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        {{ \Carbon\Carbon::parse($visite->visit_date)->format('d/m/Y H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('properties.show', $visite->property->id) }}" class="text-decoration-none">
                                        {{ $visite->property->title }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $visite->status === 'en_attente' ? 'info' : ($visite->status === 'confirmer' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($visite->status) }}
                                    </span>
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

<!-- Javascript -->
<script src="{{asset('assets/plugins/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1ERo0BZlK" crossorigin="anonymous"></script>

<!-- Page Specific JS -->
<script src="{{asset('assets/js/app.js')}}"></script>

<script>
// Configuration des graphiques
document.addEventListener('DOMContentLoaded', function() {
    
    // Graphique en secteurs - Statut des biens
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Disponibles', 'Vendus', 'Réservés'],
            datasets: [{
                data: [{{ $disponibles }}, 15, 8], // Vous pouvez ajuster ces valeurs
                backgroundColor: [
                    '#28a745',
                    '#dc3545',
                    '#ffc107'
                ],
                borderWidth: 3,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });

    // Graphique en barres - Demandes par mois
    const demandesCtx = document.getElementById('demandesChart').getContext('2d');
    new Chart(demandesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Demandes',
                data: [12, 19, 15, 25, {{ $contactsEnAttente }}, 18],
                backgroundColor: 'rgba(23, 162, 184, 0.8)',
                borderColor: 'rgba(23, 162, 184, 1)',
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Graphique linéaire - Activité mensuelle
    const activiteCtx = document.getElementById('activiteChart').getContext('2d');
    new Chart(activiteCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
            datasets: [
                {
                    label: 'Nouvelles propriétés',
                    data: [8, 12, 15, 18, 22, 16],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Visites programmées',
                    data: [5, 8, 12, 15, {{ $visitesAVenir }}, 14],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Graphique en donut - Types de transactions
    const transactionsCtx = document.getElementById('transactionsChart').getContext('2d');
    new Chart(transactionsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Vente', 'Location'],
            datasets: [{
                data: [65, 35], // Pourcentages des types de transactions
                backgroundColor: [
                    '#6f42c1',
                    '#fd7e14'
                ],
                borderWidth: 3,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true
                    }
                }
            },
            cutout: '60%'
        }
    });

});
</script>

</body>
</html>