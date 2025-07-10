@extends('welcome')
@section('content')
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --background-light: #ecf0f1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Navigation */
        /* .navbar {
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
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        } */
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
        /* Breadcrumb */
        .breadcrumb-section {
            background: var(--background-light);
            padding: 120px 0 30px;
        }

        .breadcrumb {
            background: none;
            padding: 0;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: var(--text-light);
        }

        .breadcrumb-item a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        /* Gallery Section */
        .gallery-section {
            background: white;
            padding: 30px 0;
            margin-top: 6rem;
        }

        .main-image {
            position: relative;
            height: 500px;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3));
            display: flex;
            align-items: flex-end;
            padding: 30px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .main-image:hover .image-overlay {
            opacity: 1;
        }

        .gallery-thumbnails {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            overflow-x: auto;
        }

        .thumbnail {
            width: 120px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
            border: 3px solid transparent;
        }

        .thumbnail:hover, .thumbnail.active {
            transform: scale(1.05);
            border-color: var(--secondary-color);
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-controls {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .gallery-btn {
            background: rgba(255,255,255,0.9);
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .gallery-btn:hover {
            background: white;
            transform: translateY(-2px);
        }

        /* Property Info */
        .property-info {
            background: white;
            padding: 40px 0;
        }

        .property-header {
            margin-bottom: 30px;
        }

        .property-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .property-location {
            font-size: 1.1rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .property-price {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .property-status {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .property-status.rent {
            background: var(--secondary-color);
        }

        /* Key Features */
        .key-features {
            background: var(--background-light);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }

        .feature-item {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .feature-value {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .feature-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Description */
        .description-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            color: var(--secondary-color);
        }

        /* Amenities */
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .amenity-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .amenity-item:last-child {
            border-bottom: none;
        }

        .amenity-item i {
            color: var(--success-color);
            margin-right: 10px;
            width: 20px;
        }

        /* Map Section */
        .map-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .map-placeholder {
            height: 400px;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.2rem;
        }

        /* Sidebar */
        .sidebar {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: sticky;
            top: 100px;
        }

        .contact-form .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        .contact-form .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
        }

        .btn-outline-primary {
            color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
          .property-badge.sale {
            background: var(--accent-color);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
        }

        .property-badge.rent {
            background: var(--secondary-color);
             color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
        }

        /* Agent Info */
        .agent-info {
            text-align: center;
            padding: 20px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .agent-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 15px;
            overflow: hidden;
        }

        .agent-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Mortgage Calculator */
        .calculator-section {
            background: var(--background-light);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .calculator-result {
            background: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-top: 15px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        .footer h5 {
            color: white;
            margin-bottom: 20px;
        }

        .footer p {
            color: rgba(255,255,255,0.8);
            margin-bottom: 10px;
        }

        .social-icons a {
            color: rgba(255,255,255,0.8);
            font-size: 1.2rem;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .property-title {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .sidebar {
                margin-top: 30px;
                position: static;
            }
        }
    </style>


    <!-- Breadcrumb -->
   

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-image" id="mainImage">
                        @if ($propriété->images->isEmpty()) 
                                <img id="main-image" src="{{ asset('img/default.png') }}" alt="Image" class="img-fluid">
                            @else
                            <img id="main-image"  src="{{ asset('biens/' . $propriété->images[0]->image_path) }}" alt="Appartement moderne">
                        @endif
                        
                    </div>
                    <div class="gallery-thumbnails">
                        @for ($i = 1; $i < count($propriété->images); $i++)
                                   <div class="thumbnail active" onclick="changeMainImage(this, '{{ asset('biens/' . $propriété->images[$i]->image_path) }}')">
                            <img src="{{ asset('biens/' . $propriété->images[$i]->image_path) }}"alt="Vue extérieure">
                        </div>
                        @endfor
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Info -->
    <section class="property-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Header -->
                    <div class="property-header">
                        <h1 class="property-title">{{ $propriété->title }}</h1>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>{{ $propriété->address }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="property-price">285 000 €</div>
                            {{-- <div class="property-status">À Vendre</div> --}}
                             @if ($propriété->transaction_type == 'location')
                            <div class="property-badge rent">À Louer</div>
                            @else
                            
                            <div class="property-badge sale">À Vendre</div>
                            @endif
                        </div>
                    </div>

                    <!-- Key Features -->
                    <div class="key-features">
                        <h3 class="section-title">
                            <i class="fas fa-key"></i>
                            Caractéristiques principales
                        </h3>
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-bed"></i>
                                </div>
                                <div class="feature-value">2</div>
                                <div class="feature-label">Chambres</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-bath"></i>
                                </div>
                                <div class="feature-value">1</div>
                                <div class="feature-label">Salle de bain</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-ruler-combined"></i>
                                </div>
                                <div class="feature-value">{{ $propriété->surface_habitable }}</div>
                                <div class="feature-label">m² habitable</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="feature-value">{{ illuminate\Support\Carbon::parse($propriété->created_at)->format('Y/M') }}</div>
                                <div class="feature-label">Année</div>
                            </div>
                         
                            
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="description-section">
                        <h3 class="section-title">
                            <i class="fas fa-align-left"></i>
                            Description
                        </h3>
                        <p>{{ $propriété->description }}</p>
                      
                    </div>

                    <!-- Amenities -->
               
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Agent Info -->
                        <div class="agent-info">
                            {{-- <div class="agent-avatar">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=80&h=80&fit=crop&crop=face" alt="Agent immobilier">
                            </div> --}}
                            <h5>{{ $propriété->agent->name }}</h5>
                            <p class="text-muted">Agent immobilier certifié</p>
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <span class="ms-2">4.9/5 (47 avis)</span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="tel:{{ $propriété->agent->phone }}" class="btn btn-primary">
                                    <i class="fas fa-phone me-2"></i>
                                    Appeler maintenant
                                </a>
                                <button class="btn btn-outline-primary" onclick="toggleContactForm()">
                                    <i class="fas fa-envelope me-2"></i>
                                    Programmer un visite
                                </button>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="contact-form" id="contactForm" style="display: none;">
                            <h5 class="mb-3">Contactez l'agent</h5>
                            <form action="{{route('programer_visites.store')}}" method="POST" class="form">
                                @csrf
                                <input type="text" name="property_id" value="{{ $propriété->id }}">
                                <input type="text" name="agent_id" value="{{ $propriété->agent->id }}" >
                                <input type="tel" class="form-control" placeholder="Votre téléphone">
                                <textarea class="form-control" rows="4" placeholder="Votre message" name="message" required>Je suis intéressé(e) par ce bien. Pouvez-vous me contacter ?</textarea>
                                <input type="date" id="date" class="form-control" name="visit_date" required >
                                <input type="time" id="heure" class="form-control" name="visit_time" required>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Envoyer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
function changeMainImage(thumbnail, newSrc) {
    // Changer la source de l'image principale
    const mainImage = document.getElementById('main-image');
   
    if (mainImage) {
        mainImage.src = newSrc;
    }

    // Supprimer la classe "active" de toutes les miniatures
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(el => el.classList.remove('active'));

    // Ajouter la classe "active" à la miniature cliquée
    thumbnail.classList.add('active');
}
function toggleContactForm() {
    const contactForm = document.getElementById('contactForm');
    contactForm.style.display = contactForm.style.display === 'none' ? 'block' : 'none';
}


flatpickr("#date", {
    dateFormat: "Y-m-d",
    locale: "fr"
});

</script>

@endsection