{{-- @extends('welcome')
@section('content')
    @include('Accueil.hero')
    @include('Accueil.bien')
    @include('Accueil.service')
    @include('Accueil.contact')
@endsection

     --}}
     <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tawfekh-Immo - Trouvez la Maison de Vos Rêves</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .top-bar {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: #e74c3c !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-nav .nav-link {
            color: #2c3e50 !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #e74c3c !important;
        }

        .btn-inscription {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-inscription:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 70%, #4a6fa5 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .trust-badge {
            background: rgba(255,255,255,0.1);
            padding: 15px 25px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
        }

        .search-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin-top: 40px;
        }

        .search-card h4 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
        }

        .btn-search {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-search:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        /* Stats Section */
        .stats-section {
            background: #2c3e50;
            color: white;
            padding: 60px 0;
        }

        .stat-card {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #f39c12;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Properties Section */
        .properties-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        .property-card:hover {
            transform: translateY(-5px);
        }

        .property-image {
            height: 250px;
            background: linear-gradient(45deg, #3498db, #2980b9);
            position: relative;
            overflow: hidden;
        }

        .property-image::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .property-image::after {
            content: '🏠';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            z-index: 1;
        }

        .property-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e74c3c;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .property-content {
            padding: 25px;
        }

        .property-price {
            font-size: 1.5rem;
            color: #e74c3c;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .property-location {
            color: #7f8c8d;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .property-features {
            display: flex;
            gap: 15px;
            font-size: 14px;
            color: #7f8c8d;
        }

        .property-features span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Services Section */
        .services-section {
            padding: 80px 0;
            background: white;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 32px;
            color: white;
        }

        .service-title {
            font-size: 1.3rem;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .service-description {
            color: #7f8c8d;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .btn-service {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-service:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            text-align: center;
        }

        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db, #2980b9);
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            font-weight: 600;
        }

        .testimonial-text {
            font-style: italic;
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .testimonial-author {
            font-weight: 600;
            color: #2c3e50;
        }

        .testimonial-role {
            color: #7f8c8d;
            font-size: 14px;
        }

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background: white;
        }

        .contact-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 30px;
        }

        .contact-form {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-info {
            background: #2c3e50;
            color: white;
            border-radius: 15px;
            padding: 40px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: #e74c3c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .btn-contact {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-contact:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 50px 0 20px;
        }

        .footer-section h5 {
            color: #e74c3c;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #e74c3c;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .social-links a:hover {
            background: #e74c3c;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: #bdc3c7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .search-card {
                padding: 20px;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-phone"></i> +221 77 123 45 67
                    <span class="ms-3"><i class="fas fa-envelope"></i> contact@tawfekh-immo.sn</span>
                </div>
                <div class="col-md-6 text-end">
                    <span><i class="fas fa-clock"></i> Lun-Ven: 9h00-17h00 | Sam: 9h00-14h00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-home"></i>
                Tawfekh-Immo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
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
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary">Connexion</button>
                    <button class="btn btn-inscription">Inscription</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="accueil">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="trust-badge">
                            <i class="fas fa-award"></i> Agence Certifiée • 15 ans d'expérience
                        </div>
                        <h1 class="hero-title">Trouvez la Maison de Vos Rêves</h1>
                        <p class="hero-subtitle">
                            Votre partenaire de confiance pour tous vos projets immobiliers à Dakar et ses environs. 
                            Des solutions personnalisées avec un accompagnement professionnel.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <button class="btn btn-light btn-lg">
                                <i class="fas fa-search"></i> Découvrir nos biens
                            </button>
                            <button class="btn btn-outline-light btn-lg">
                                <i class="fas fa-play"></i> Voir la vidéo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="search-card">
                        <h4><i class="fas fa-search"></i> Recherche Rapide</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option>Type de bien</option>
                                        <option>Appartement</option>
                                        <option>Maison</option>
                                        <option>Villa</option>
                                        <option>Terrain</option>
                                        <option>Local commercial</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option>Transaction</option>
                                        <option>Vente</option>
                                        <option>Location</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Ville ou quartier">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Budget max">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-search">
                                        <i class="fas fa-search"></i> Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
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
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Biens Vendus</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">15</div>
                        <div class="stat-label">Années d'Expérience</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">1200+</div>
                        <div class="stat-label">Clients Satisfaits</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Taux de Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="properties-section" id="proprietes">
        <div class="container">
            <div class="section-title">
                <h2>Propriétés en Vedette</h2>
                <p class="text-muted">Découvrez notre sélection de biens d'exception</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-badge">NOUVEAU</div>
                        </div>
                        <div class="property-content">
                            <div class="property-price">250,000,000 FCFA</div>
                            <div class="property-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Almadies, Dakar
                            </div>
                            <h5>Appartement moderne avec vue mer</h5>
                            <div class="property-features">
                                <span><i class="fas fa-bed"></i> 3 chambres</span>
                                <span><i class="fas fa-bath"></i> 2 SDB</span>
                                <span><i class="fas fa-ruler-combined"></i> 120m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-badge">PROMOTION</div>
                        </div>
                        <div class="property-content">
                            <div class="property-price">180,000,000 FCFA</div>
                            <div class="property-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Mermoz, Dakar
                            </div>
                            <h5>Villa familiale avec jardin</h5>
                            <div class="property-features">
                                <span><i class="fas fa-bed"></i> 4 chambres</span>
                                <span><i class="fas fa-bath"></i> 3 SDB</span>
                                <span><i class="fas fa-ruler-combined"></i> 200m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-badge">EXCLUSIVITÉ</div>
                        </div>
                        <div class="property-content">
                            <div class="property-price">95,000,000 FCFA</div>
                            <div class="property-location">
                                <i class="fas fa-map-marker-alt"></i>
                                Pikine, Dakar
                            </div>
                            <h5>Appartement neuf bien situé</h5>
                            <div class="property-features">
                                <span><i class="fas fa-bed"></i> 2 chambres</span>
                                <span><i class="fas fa-bath"></i> 1 SDB</span>
                                <span><i class="fas fa-ruler-combined"></i> 75m²</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-eye"></i> Voir tous nos biens
                </button>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Nos Services</h2>
                <p class="text-muted">Une expertise complète pour tous vos besoins immobiliers</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4 class="service-title">Vente Immobilière</h4>
                        <p class="service-description">
                            Accompagnement personnalisé pour la vente de votre bien avec estimation gratuite, 
                            marketing adapté et négociation optimale.
                        </p>
                        <button class="btn btn-service">En savoir plus</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <h4 class="service-title">Location</h4>
                        <p class="service-description">
                            Trouvez le locataire idéal pour votre bien ou la location parfaite selon vos critères. 
                            Gestion locative complète disponible.
                        </p>
                        <button class="btn btn-service">En savoir plus</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="service-title">Investissement</h4>
                        <p class="service-description">
                            Conseils personnalisés pour optimiser vos investissements immobiliers et maximiser 
                            votre rentabilité sur le marché sénégalais.
                        </p>
                        <button class="btn btn-service">En savoir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-title">
                <h2>Témoignages Clients</h2>
                <p class="text-muted">Ce que disent nos clients satisfaits</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">AM</div>
                        <p class="testimonial-text">
                            "Service exceptionnel ! L'équipe de Tawfekh-Immo m'a aidé à trouver la maison parfaite 
                            pour ma famille. Professionnalisme et écoute au rendez-vous."
                        </p>
                        <div class="testimonial-author">Aminata Mbaye</div>
                        <div class="testimonial-role">Acheteuse</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">IS</div>
                        <p class="testimonial-text">
                            "Vente de ma villa réalisée en moins de 2 mois ! Prix négocié au-dessus de mes attentes. 
                            Je recommande vivement cette agence."
                        </p>
                        <div class="testimonial-author">Ibrahima Sarr</div>
                        <div class="testimonial-role">Vendeur</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">FK</div>
                        <p class="testimonial-text">
                            "Investissement immobilier réussi grâce aux conseils avisés de l'équipe. 
                            Rentabilité au rendez-vous depuis 3 ans !"
                        </p>
                        <div class="testimonial-author">Fatou Kone</div>
                        <div class="testimonial-role">Investisseuse</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->