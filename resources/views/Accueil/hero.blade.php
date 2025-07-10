<section class="hero-section" id="accueil">
   
        <div class="container">
            @notifyCss
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">Trouvez la Maison de Vos Rêves</h1>
                        <p class="hero-subtitle">Avec plus de 15 ans d'expérience, nous vous accompagnons dans tous vos projets immobiliers</p>
                        <a href="{{ route('accueil.biens') }}" class="btn btn-primary-custom">
                            <i class="fas fa-search me-2"></i>Découvrir nos biens
                        </a>
                    </div>
                    
                    <div class="search-form">
                        <h4 class="mb-3">Recherche rapide</h4>
                        <form action="{{ route('properties.ajax.search') }}" method="GET" class="form">
{{--                             
                            <input type="text" name="bedrooms" placeholder="Chambres" class="form-control mb-3" />
                          <input type="number" class="form-control" name="minSurface" placeholder="Surface min (m²)">
                            <input type="number" class="form-control mb-3" name="maxPrice" placeholder="Prix max (Fr)" /> --}}

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <select class="form-select" name="propertyType">
                                        <option value="">Type de bien</option>
                                        @foreach ($typePropriété as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="transactionType">
                                        <option value="">Transaction</option>
                                        <option value="Vente">Vente</option>
                                        <option value="location">Location</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="location" placeholder="Ville ou quartier">
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
   