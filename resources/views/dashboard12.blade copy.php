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
  </head>
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/portal.css')}}">
    <style>
        body { background: #f6f8fc; }
        .main-content-with-sidebar {
            margin-left: 250px;
            margin-right: 80px;
            transition: margin 0.3s;
        }
        @media (max-width: 991px) {
            .main-content-with-sidebar {
                margin-left: 0;
                margin-right: 0;
            }
        }
        .dashboard-block {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(40,167,69,0.08);
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
            
        }
        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .dashboard-title i {
            margin-right: 10px;
        }
        .chart-container {
            min-height: 320px;
            overflow-x: auto;
            padding: 0;
        }
        .chart-container canvas {
            width: 100% !important;
            height: auto !important;
            display: block;
            margin: 0 auto;
        }
        .recent-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .recent-list li {
            padding: 1rem 0.5rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .recent-list li:last-child { border-bottom: none; }
        .recent-article-title {
            font-weight: 600;
            color: #5D4C3B;
        }
        .recent-article-date {
            color: #888;
            font-size: 0.95rem;
        }
        @media (max-width: 991px) {
            .dashboard-block { padding: 1rem 0.5rem; }
        }
        .app-card.app-card-stat {
            max-width: 320px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head> 

<body class="app">   	
<!--//app-header-->
<header class="app-header fixed-top">	
    @include('layout.header')
    @include('layout.sidebar')
</header>

<div class="container-fluid mt-4 main-content-with-sidebar">
    <!-- Statistiques -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="app-card-stat-title">Total Articles</div>
                            <div class="app-card-stat-value">150</div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon bg-primary text-white">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      
        
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="app-card-stat-title">Visiteurs</div>
                            <div class="app-card-stat-value">2,500</div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon bg-info text-white">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="app-card-stat-title">Commentaires</div>
                            <div class="app-card-stat-value">45</div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-icon bg-warning text-white">
                                <i class="fas fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Diagrammes -->
    <div class="row g-4 mb-4">
        <div class="col-lg-7">
            <div class="dashboard-block">
                <div class="dashboard-title"><i class="fas fa-chart-bar"></i> Articles publiés par mois</div>
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="dashboard-block">
                <div class="dashboard-title"><i class="fas fa-chart-pie"></i> Répartition des catégories</div>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Derniers articles -->
    <div class="row g-4 mb-4">
        <div class="col-lg-7">
            <div class="dashboard-block">
                <div class="dashboard-title"><i class="fas fa-clock"></i> Derniers articles publiés</div>
                <ul class="recent-list">
                    <li><span class="recent-article-title">Lancement du nouveau site</span> <span class="recent-article-date">07/06/2024</span></li>
                    <li><span class="recent-article-title">Interview avec l'imam</span> <span class="recent-article-date">05/06/2024</span></li>
                    <li><span class="recent-article-title">Conseils pour le Ramadan</span> <span class="recent-article-date">01/06/2024</span></li>
                    <li><span class="recent-article-title">Annonce des nouveaux cours</span> <span class="recent-article-date">28/05/2024</span></li>
                </ul>
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

 
    <!-- Javascript -->          
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('assets/js/index-charts.js')}}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script> 
    
    

</body>
</html> 

<script>
// Bar Chart
const barCtx = document.getElementById('barChart').getContext('2d');
new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
            label: 'Articles',
            data: [12, 19, 8, 15, 22, 17, 10, 14, 9, 11, 7, 13],
            backgroundColor: '#28a745',
            borderRadius: 8,
            maxBarThickness: 32
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
// Pie Chart
const pieCtx = document.getElementById('pieChart').getContext('2d');
new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Actualités', 'Conseils', 'Cours', 'Interviews'],
        datasets: [{
            data: [40, 25, 20, 15],
            backgroundColor: ['#28a745', '#007bff', '#ffc107', '#5D4C3B'],
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});
</script> 

