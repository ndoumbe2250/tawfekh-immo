<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client - Immobilier</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Menu latéral */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .logo {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin-bottom: 30px;
        }

        .logo h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item:hover,
        .menu-item.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-right: 3px solid #fff;
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 18px;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .header {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header h1 {
            color: #2d3748;
            margin-bottom: 10px;
        }

        .header p {
            color: #718096;
        }

        /* Cartes statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h3 {
            color: #2d3748;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-card p {
            color: #718096;
            font-size: 14px;
        }

        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .icon-blue { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
        .icon-green { background: linear-gradient(135deg, #48bb78, #38a169); color: white; }
        .icon-orange { background: linear-gradient(135deg, #ed8936, #dd6b20); color: white; }
        .icon-purple { background: linear-gradient(135deg, #9f7aea, #805ad5); color: white; }

        /* Section des biens */
        .properties-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            color: #2d3748;
            font-size: 20px;
            font-weight: 600;
        }

        .btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .property-card {
            display: flex;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .property-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .property-image {
            width: 150px;
            height: 100px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .property-info {
            flex: 1;
            padding: 15px;
        }

        .property-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 5px;
        }

        .property-details {
            color: #718096;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .property-price {
            color: #667eea;
            font-weight: 600;
            font-size: 16px;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                order: 2;
            }
            
            .main-content {
                order: 1;
                padding: 20px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }


        .rdv-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
        }

        .rdv-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .rdv-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
        }

        .rdv-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .rdv-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .rdv-type {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-visite {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        .type-signature {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
        }

        .type-estimation {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
        }

        .rdv-date {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1.1em;
            color: #2c3e50;
            font-weight: 600;
        }

        .rdv-property {
            margin-bottom: 15px;
        }

        .property-title {
            font-size: 1.2em;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .property-address {
            color: #7f8c8d;
            font-size: 0.95em;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rdv-details {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #7f8c8d;
            font-size: 0.9em;
        }

        .rdv-agent {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: rgba(52, 152, 219, 0.1);
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .agent-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db, #2980b9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .rdv-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9em;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-secondary {
            background: #ecf0f1;
            color: #2c3e50;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-confirme {
            background: #d5f4e6;
            color: #27ae60;
        }

        .status-attente {
            background: #fef9e7;
            color: #f39c12;
        }

        .status-reporte {
            background: #fadbd8;
            color: #e74c3c;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }









    </style>
</head>
<body>
    <div class="container">
        <!-- Menu latéral -->
        <div class="sidebar">
            <div class="logo">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            
            <nav>
                <div class="menu-item active" onclick="showSection('dashboard')">
                    <span>📊</span>
                    <span>Tableau de bord</span>
                </div>
                
                <div class="menu-item" onclick="showSection('favorites')">
                    <span>❤️</span>
                    <span>Favoris</span>
                </div>
                <div class="menu-item" onclick="showSection('appointments')">
                    <span>📅</span>
                    <span>Rendez-vous</span>
                </div>
                <div class="menu-item" onclick="showSection('messages')">
                    <span>💬</span>
                    <span>Messages</span>
                </div>
                
                <div class="menu-item" onclick="showSection('profile')">
                    <span>👤</span>
                    <span>Profil</span>
                </div>
                <div class="menu-item" onclick="showSection('settings')">
                    <span>⚙️</span>
                    <span>Paramètres</span>
                </div>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <!-- Section Dashboard -->
            <div id="dashboard" class="content-section active">
                <div class="header">
                    <h1>Tableau de bord</h1>
                    <p>Bienvenue dans votre espace client immobilier</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon icon-blue">🏠</div>
                        <h3>{{count($propertiesviewed)}}</h3>
                        <p>Biens consultés</p>
                    </div>
                    <div class="stat-card">
                        <div class="icon icon-green">❤️</div>
                        <h3>{{count($properties)}}</h3>
                        <p>Biens favoris</p>
                    </div>
                    <div class="stat-card">
                        <div class="icon icon-orange">📅</div>
                        <h3>{{count($visites)}}</h3>
                        <p>Visites planifiées</p>
                    </div>
                    <div class="stat-card">
                        <div class="icon icon-purple">💬</div>
                        <h3>8</h3>
                        <p>Messages reçus</p>
                    </div>
                </div>

                <div class="properties-section">
                    <div class="section-header">
                        <h2 class="section-title">Biens récemment consultés</h2>
                        <button class="btn">Voir tout</button>
                    </div>
                    @if (isset($propertiesviewed))
                    @foreach ($propertiesviewed as $viewed) 
                    <a href="{{ route('accueil.bien.show', $viewed->id) }}"  style="text-decoration: none">
                        <div class="property-card">
                            <div class="property-image">
                                 @if ($viewed->images->isEmpty()) 
                                        <img src="{{ asset('img/default.png') }}" alt="Image" width="100%" height="100%" >
                                    @else
                                        <img src="{{ asset('biens/' . $viewed->images[0]->image_path) }}" alt="Appartement moderne" width="100%" height="100%">
                                    @endif
                            </div>
                            <div class="property-info">
                                <div class="property-title">{{$viewed->title}} - {{$viewed->address}}</div>
                                <div class="property-details">{{$viewed->surface}} m² • {{$viewed->nb_chambres}} chambres • {{$viewed->nb_salles_bain}} salle de bain</div>
                                <div class="property-price">{{$viewed->prix}} Fr</div>
                            </div>
                        </div>
                    
                    </a>
                        
                    @endforeach
                    
                    @else
                    <div class="property-card">
                    <p>Vous n'avez pas encore consulté de biens.</p>
                    </div>
                    @endif
                    
                   {{-- petit poid mayonnaise et oeuf dure  --}}
                </div>
            </div>

            <!-- Section Mes biens -->
            <div id="properties" class="content-section">
                <div class="header">
                    <h1>Mes biens</h1>
                    <p>Gérez vos propriétés et suivez leur évolution</p>
                </div>
                <div class="properties-section">
                    <p>Vous n'avez pas encore de biens enregistrés.</p>
                    <button class="btn">Ajouter un bien</button>
                </div>
            </div>

            <!-- Section Favoris -->
            <div id="favorites" class="content-section">
                <div class="header">
                    <h1>Mes favoris</h1>
                    <p>Retrouvez tous vos biens préférés</p>
                </div>
                <div class="properties-section">
                    @if (isset($properties))
                    @foreach ($properties as $property)
                    <a href="{{ route('accueil.bien.show', $property->id) }}"  style="text-decoration: none">
                        <div class="property-card">
                            <div class="property-image">
                                 @if ($property->images->isEmpty()) 
                                        <img src="{{ asset('img/default.png') }}" alt="Image" width="100%" height="100%" >
                                    @else
                                        <img src="{{ asset('biens/' . $property->images[0]->image_path) }}" alt="Appartement moderne" width="100%" height="100%">
                                    @endif
                            </div>
                            <div class="property-info">
                                <div class="property-title">{{$property->title}} - {{$property->address}}</div>
                                <div class="property-details">{{$property->surface}} m² • {{$property->nb_chambres}} chambres • {{$property->nb_salles_bain}} salle de bain</div>
                                <div class="property-price">{{$property->prix}} Fr</div>
                            </div>
                        </div>
                    
                    </a>
                        
                    @endforeach
                        
                    @else
                    <p>Aucun favori pour le moment.</p>
                    @endif
                </div>
            </div>

            <!-- Section Rendez-vous -->
            <div id="appointments" class="content-section">
                <div class="header">
                    <h1>Mes rendez-vous</h1>
                    <p>Planifiez et suivez vos visites</p>
                </div>
                <div class="rdv-grid">
                    @if (isset($visites))
                        @foreach ($visites as $visite)
                            
                       
                    
                   <div class="rdv-card" data-type="visite">
                <div class="rdv-header">
                    <div class="rdv-type type-visite">Visite</div>
                    <div class="status-badge status-confirme">
                        {{ $visite->status }}
                    </div>
                </div>
                
                <div class="rdv-date">
                    🗓️ Mardi 8 Juillet 2025 à 14h30
                </div>
                
                <div class="rdv-property">
                    <div class="property-title">Appartement 3 pièces - 75m²</div>
                    <div class="property-address">📍 15 Rue de la Paix, 75001 Paris</div>
                </div>
                
                <div class="rdv-details">
                    <div class="detail-item">💰 420 000 €</div>
                    <div class="detail-item">⏱️ 1h</div>
                    <div class="detail-item">🏢 2ème étage</div>
                </div>
                
                <div class="rdv-agent">
                    <div class="agent-avatar">JM</div>
                    <div>
                        <strong>Jean Martin</strong><br>
                        <span style="color: #7f8c8d;">📞 06 12 34 56 78</span>
                    </div>
                </div>
                
                <div class="rdv-actions">
                    <button class="btn btn-primary">Modifier</button>
                    <button class="btn btn-secondary">Annuler</button>
                </div>
            </div>
             @endforeach
                    @else
                    <p>Aucun rendez-vous pour le moment.</p>
                    @endif
                </div>
            </div>

            <!-- Section Messages -->
            <div id="messages" class="content-section">
                <div class="header">
                    <h1>Messages</h1>
                    <p>Communiquez avec les agents immobiliers</p>
                </div>
                <div class="properties-section">
                    <p>Aucun message pour le moment.</p>
                </div>
            </div>

            <!-- Section Documents -->
            <div id="documents" class="content-section">
                <div class="header">
                    <h1>Mes documents</h1>
                    <p>Gérez vos documents immobiliers</p>
                </div>
                <div class="properties-section">
                    <p>Aucun document uploadé.</p>
                    <button class="btn">Ajouter un document</button>
                </div>
            </div>

            <!-- Section Profil -->
            <div id="profile" class="content-section">
                <div class="header">
                    <h1>Mon profil</h1>
                    <p>Gérez vos informations personnelles</p>
                </div>
                <div class="properties-section">
                    <p><strong>Nom :</strong> Jean Dupont</p>
                    <p><strong>Email :</strong> jean.dupont@email.com</p>
                    <p><strong>Téléphone :</strong> 06 12 34 56 78</p>
                    <button class="btn">Modifier le profil</button>
                </div>
            </div>

            <!-- Section Paramètres -->
            <div id="settings" class="content-section">
                <div class="header">
                    <h1>Paramètres</h1>
                    <p>Configurez vos préférences</p>
                </div>
                <div class="properties-section">
                    <p>Notifications par email : Activées</p>
                    <p>Notifications SMS : Désactivées</p>
                    <button class="btn">Modifier les paramètres</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Masquer toutes les sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Retirer la classe active de tous les éléments du menu
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });

            // Afficher la section sélectionnée
            document.getElementById(sectionId).classList.add('active');

            // Activer l'élément du menu correspondant
            event.target.closest('.menu-item').classList.add('active');
        }

        // Animation au chargement
        window.addEventListener('load', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });
    </script>
</body>
</html>