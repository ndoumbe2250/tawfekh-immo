<!DOCTYPE html>
<html lang="fr"> 
<head>
    @php
    $isEdit = isset($typeProperty);
    @endphp
</head> 

<body class="app">   	
<!--//app-header-->
<header class="app-header fixed-top">	
    @include('layout.header')
    @include('layout.sidebar')
</header>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="app-card app-card-account shadow-sm p-4 mb-4">
                    <div class="app-card-body">
                        <h1 class="app-page-title">Mes Favoris</h1>
                        @if ($favorites->isEmpty())
                            <p class="text-muted">Vous n'avez pas encore ajouté de propriétés à vos favoris.</p>
                        @else
                            <div class="table-responsive">  
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Propriété</th>
                                            <th class="cell">Type</th>
                                            <th class="cell">Ville</th>
                                            <th class="cell">Prix</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($favorites as $favorite)
                                            <tr>
                                                <td class="cell">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $favorite->property->image) }}" alt="{{ $favorite->property->title }}" class="img-thumbnail me-3" style="width: 50px; height: 50px;">
                                                        <span>{{ $favorite->property->title }}</span>
                                                    </div>
                                                </td>
                                                <td class="cell">{{ $favorite->property->typeProperty->name }}</td>
                                                <td class="cell">{{ $favorite->property->city }}</td>
                                                <td class="cell">{{ number_format($favorite->property->price, 0, ',', ' ') }} FCFA</td>
                                                <td class="cell">
                                                    <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-trash"></i> Retirer
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<footer class="app-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <p class="mb-0">© {{ date('Y') }} Tawfekh-Immo. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>