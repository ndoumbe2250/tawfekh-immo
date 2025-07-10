<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tawfékh-Immo - Votre Partenaire Immobilier</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {!! ToastMagic::styles() !!}
</head>
<body>
    <style>
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: var(--secondary-color);
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }
    </style>
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-home me-2"></i>Tawfékh-Immo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->current() === url('/') ? '#accueil' : url('/#accueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->current() === url('/') ? '#services' : url('/#services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->current() === url('/') ? '#proprietes' : url('/#proprietes') }}">Propriétés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->current() === url('/') ? '#contact' : url('/#contact') }}">Contact</a>
                    </li>
                    
                </ul>
            </div>
           <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('client.dashboard')}}">Dashboard</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.register') }}">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.login') }}">Connexion</a>
            </li>
        @endauth
    </ul>
</div>

        </div>
    </nav>
<div class="main-content">
    @yield('content')
</div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="fas fa-home me-2"></i>ImmoExpert</h5>
                    <p>Votre partenaire de confiance pour tous vos projets immobiliers. Expertise, professionnalisme et service personnalisé.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Contact</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Guédiawaye, Dakar</p>
                    <p><i class="fas fa-phone me-2"></i>+33 1 23 45 67 89</p>
                    <p><i class="fas fa-envelope me-2"></i>contact@tawfékhImmo.fr</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Horaires d'ouverture</h5>
                    <p>Lundi - Vendredi: 9h00 - 18h00</p>
                    <p>Samedi: 9h00 - 17h00</p>
                    <p>Dimanche: Sur rendez-vous</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2025 ImmoExpert. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'linear-gradient(135deg, rgba(44, 62, 80, 0.95), rgba(52, 73, 94, 0.95))';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'linear-gradient(135deg, var(--primary-color), #34495e)';
                navbar.style.backdropFilter = 'none';
            }
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let count = 0;
            const increment = target / 200;
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(count) + (target.toString().includes('+') ? '+' : '') + (target.toString().includes('%') ? '%' : '');
            }, 10);
        }

        // Intersection Observer for stats animation
        const statObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = parseInt(stat.textContent);
                        animateCounter(stat, target);
                    });
                    statObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statObserver.observe(statsSection);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{!! ToastMagic::scripts() !!}

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>
</html>