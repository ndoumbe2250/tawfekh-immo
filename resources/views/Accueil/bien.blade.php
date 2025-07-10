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
        <section class="py-5 bg-light" id="proprietes">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-primary">Propriétés en Vedette</h2>
                    <p class="lead">Découvrez notre sélection de biens d'exception</p>
                </div>
            </div>
           
            <div class="row">
                @foreach ($propriétés as $propriété) 
                    
                <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            @if ($propriété->transaction_type == 'location')
                            <div class="property-price-loaction">{{$propriété->prix}}Fr/mois</div>
                            @else
                            <div class="property-price">{{$propriété->prix}}Fr</div>                               
                            @endif
                            <div class="d-flex align-items-center justify-content-center h-100">
                                @if ($propriété->images->isEmpty()) 
                        <img src="{{ asset('img/default.png') }}" alt="Image" class="img-fluid" >
                        @else
                        <img src="{{ asset('biens/' . $propriété->images[0]->image_path) }}" alt="Image" class="img-fluid" >
                                    
                                @endif

                            </div>
                        </div>
                        <div class="p-3">
                            <h5>{{$propriété->title}}</h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{$propriété->address}}</p>
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-bed me-1"></i>{{$propriété->nb_chambres}}</span>
                                <span><i class="fas fa-bath me-1"></i>{{$propriété->nb_salles_bain}}</span>
                                <span><i class="fas fa-ruler-combined me-1"></i>{{$propriété->surface_habitable}}m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6">
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
                </div> --}}
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="property-card">
                        <div class="property-image">
                            <div class="property-price">€180,000</div>
                            <div class="d-flex align-items-center justify-content-center h-100">
                                {{-- <i class="fas fa-camera" style="font-size: 3rem; color: #95a5a6;"></i> --}}
                        {{--    </div>
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
                </div> --}}
            </div>
        </div>
        <div class="text-center mt-4">
                <p class="lead">Vous souhaitez en savoir plus ?</p>
              <a href="{{ route('accueil.biens') }}" class="btn btn-primary-custom">
                            <i class="fas fa-search me-2"></i>Découvrir nos biens
                </a>
        </div>
    </section>