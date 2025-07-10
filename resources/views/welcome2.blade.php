<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoExpert - Votre Partenaire Immobilier</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
            --gold-color: #f39c12;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--gold-color) !important;
            transform: translateY(-2px);
        }

        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(52, 73, 94, 0.8)),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23ecf0f1" width="1200" height="600"/><path fill="%23bdc3c7" d="M200,400 L400,200 L600,350 L800,150 L1000,300 L1200,100 L1200,600 L0,600 Z"/></svg>');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #ecf0f1;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .btn-primary-custom {
            background: linear-gradient(45deg, var(--secondary-color), #c0392b);
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
            background: linear-gradient(45deg, #c0392b, var(--secondary-color));
        }

        .search-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            margin-top: 3rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-top: 4px solid var(--accent-color);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .stats-section {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            padding: 4rem 0;
        }

        .stat-item {
            text-align: center;
            margin-bottom: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--gold-color);
            display: block;
        }

        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .property-image {
            height: 250px;
            background: linear-gradient(45deg, #bdc3c7, #ecf0f1);
            position: relative;
            overflow: hidden;
        }

        .property-price {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 25px;
            font-weight: bold;
        }

        .footer {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer h5 {
            color: var(--gold-color);
            margin-bottom: 1rem;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--gold-color);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .search-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
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
                        <a class="nav-link" href="#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#proprietes">Propriétés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="accueil">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">Trouvez la Maison de Vos Rêves</h1>
                        <p class="hero-subtitle">Avec plus de 15 ans d'expérience, nous vous accompagnons dans tous vos projets immobiliers</p>
                        <button class="btn btn-primary-custom">
                            <i class="fas fa-search me-2"></i>Découvrir nos biens
                        </button>
                    </div>
                    
                    <div class="search-form">
                        <h4 class="mb-3">Recherche rapide</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <select class="form-select">
                                        <option>Type de bien</option>
                                        <option>Appartement</option>
                                        <option>Maison</option>
                                        <option>Villa</option>
                                        <option>Bureau</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select">
                                        <option>Transaction</option>
                                        <option>Vente</option>
                                        <option>Location</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Ville ou quartier">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Prix minimum">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Prix maximum">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom w-100">
                                        <i class="fas fa-search me-2"></i>Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-primary">Nos Services</h2>
                    <p class="lead">Une expertise complète pour tous vos besoins immobiliers</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Vente Immobilière</h4>
                        <p>Nous vous accompagnons dans la vente de votre bien avec une estimation précise et une stratégie marketing adaptée.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <h4>Location</h4>
                        <p>Trouvez le locataire idéal ou le bien parfait à louer grâce à notre réseau étendu et notre expertise du marché.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Investissement</h4>
                        <p>Conseils personnalisés pour optimiser vos investissements immobiliers et maximiser votre rentabilité.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <h5>Biens Vendus</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">15</span>
                        <h5>Années d'Expérience</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">1200+</span>
                        <h5>Clients Satisfaits</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <h5>Taux de Satisfaction</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="py-5 bg-light" id="proprietes">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-primary">Propriétés en Vedette</h2>
                    <p class="lead">Découvrez notre sélection de biens d'exception</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-price">€450,000</div>
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="fas fa-camera" style="font-size: 3rem; color: #95a5a6;"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h5>Villa Moderne</h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Quartier Résidentiel</p>
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-bed me-1"></i>4 chambres</span>
                                <span><i class="fas fa-bath me-1"></i>3 salles de bain</span>
                                <span><i class="fas fa-ruler-combined me-1"></i>250m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-price">€320,000</div>
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="fas fa-camera" style="font-size: 3rem; color: #95a5a6;"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h5>Appartement Standing</h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Centre Ville</p>
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-bed me-1"></i>3 chambres</span>
                                <span><i class="fas fa-bath me-1"></i>2 salles de bain</span>
                                <span><i class="fas fa-ruler-combined me-1"></i>120m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-price">€180,000</div>
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="fas fa-camera" style="font-size: 3rem; color: #95a5a6;"></i>
                            </div>
                        </div>
                        <div class="p-3">
                            <h5>Maison Familiale</h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Banlieue Calme</p>
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-bed me-1"></i>3 chambres</span>
                                <span><i class="fas fa-bath me-1"></i>2 salles de bain</span>
                                <span><i class="fas fa-ruler-combined me-1"></i>150m²</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-primary">Contactez-Nous</h2>
                    <p class="lead">Notre équipe est à votre disposition</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Nom complet" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" placeholder="Téléphone">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Type de demande</option>
                                    <option>Vente</option>
                                    <option>Achat</option>
                                    <option>Location</option>
                                    <option>Estimation</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Votre message..."></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                    <p><i class="fas fa-map-marker-alt me-2"></i>123 Avenue des Champs, 75008 Paris</p>
                    <p><i class="fas fa-phone me-2"></i>+33 1 23 45 67 89</p>
                    <p><i class="fas fa-envelope me-2"></i>contact@immoexpert.fr</p>
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
</body>
</html>