@if($properties->count())
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">
                            {{ number_format($property->prix, 0, ',', ' ') }} €<br>
                            {{ $property->surface_habitable }} m²<br>
                            {{ $property->nb_chambres }} chambre(s)<br>
                            {{ $property->address }}
                        </p>
                        <a href="{{ route('properties.show', $property->slug) }}" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Aucun bien trouvé.</p>
@endif
