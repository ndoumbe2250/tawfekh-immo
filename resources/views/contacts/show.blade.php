<!DOCTYPE html>
<html lang="fr"> 
<head>
    @php
    $isEdit = isset($typeProperty);
    @endphp
    <title>{{ $isEdit ? 'Modifier' : 'Ajouter' }} un type de propriété</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Gestion des types de propriétés - Dashboard Admin">
    <meta name="author" content="Votre Entreprise">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/amsify/amsify.suggestags.css')}}">
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">
    
    <style>
        .contact-detail-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        .contact-detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(50%, -50%);
        }
        
        .contact-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            margin: 20px;
            position: relative;
            z-index: 2;
        }
        
        .contact-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }
        
        .contact-name {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 5px;
        }
        
        .contact-email {
            color: #667eea;
            font-size: 16px;
            font-weight: 500;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            padding: 30px;
            position: relative;
            z-index: 2;
        }
        
        .info-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .info-card.primary { border-left-color: #667eea; }
        .info-card.success { border-left-color: #48bb78; }
        .info-card.warning { border-left-color: #ed8936; }
        .info-card.info { border-left-color: #4299e1; }
        .info-card.purple { border-left-color: #9966cc; }
        .info-card.teal { border-left-color: #38b2ac; }
        
        .info-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            margin-bottom: 15px;
        }
        
        .info-icon.primary { background: linear-gradient(135deg, #667eea, #764ba2); }
        .info-icon.success { background: linear-gradient(135deg, #48bb78, #38a169); }
        .info-icon.warning { background: linear-gradient(135deg, #ed8936, #dd6b20); }
        .info-icon.info { background: linear-gradient(135deg, #4299e1, #3182ce); }
        .info-icon.purple { background: linear-gradient(135deg, #9966cc, #805ad5); }
        .info-icon.teal { background: linear-gradient(135deg, #38b2ac, #319795); }
        
        .info-label {
            font-size: 14px;
            font-weight: 600;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        
        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #2d3748;
            line-height: 1.5;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .status-en-attente {
            background: linear-gradient(135deg, #fed7aa, #fdba74);
            color: #9a3412;
        }
        
        .status-traitee {
            background: linear-gradient(135deg, #bbf7d0, #86efac);
            color: #14532d;
        }
        
        .status-default {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e0);
            color: #4a5568;
        }
        
        .type-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
            text-transform: capitalize;
        }
        
        .message-container {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #667eea;
            margin-top: 10px;
        }
        
        .message-text {
            font-size: 15px;
            line-height: 1.6;
            color: #4a5568;
            margin: 0;
        }
        
        .breadcrumb-modern {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 15px 25px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .breadcrumb-modern .breadcrumb {
            margin: 0;
            background: none;
            padding: 0;
        }
        
        .breadcrumb-modern .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-modern .breadcrumb-item a:hover {
            color: #764ba2;
        }
        
        .page-header-modern {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .page-header-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-modern {
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary-modern {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        .btn-secondary-modern {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e0);
            color: #4a5568;
        }
        
        .btn-secondary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            color: #4a5568;
        }
        
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                padding: 20px;
            }
            
            .contact-header {
                padding: 20px;
                margin: 15px;
            }
            
            .contact-name {
                font-size: 24px;
            }
            
            .page-header-modern {
                padding: 20px;
                text-align: center;
            }
        }
    </style>
</head>
<body class="app">   	
    <!--//app-header-->
    <header class="app-header fixed-top">	
        @include('layout.header')
        @include('layout.sidebar')
    </header>
<div class="app-wrapper">
    {{-- Breadcrumb --}}
    <div class="container-xl">
        <div class="breadcrumb-modern">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">
                            <i class="fas fa-home me-1"></i>Accueil
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('contacts.index') }}">Contacts</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Détails du Contact
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Header --}}
    <div class="container-xl">
        <div class="page-header-modern">
            <div class="d-flex justify-content-between align-items-center">
                <div style="position: relative; z-index: 2;">
                    <h1 class="page-title mb-2" style="color: #2d3748; font-weight: 700;">
                        <i class="fas fa-user-circle text-primary me-2"></i>Détail du Contact
                    </h1>
                    <p class="page-subtitle mb-0" style="color: #718096; font-size: 16px;">
                        Informations complètes sur ce contact
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact Details --}}
    <div class="container-xl mb-5">
        <div class="contact-detail-card">
            {{-- Contact Header --}}
            <div class="contact-header text-center">
                <div class="contact-avatar mx-auto">
                    <i class="fas fa-user"></i>
                </div>
                <h2 class="contact-name">{{ $contact->name }}</h2>
                <p class="contact-email">{{ $contact->email }}</p>
            </div>

            {{-- Contact Information Grid --}}
            <div class="info-grid">
                {{-- Téléphone --}}
                <div class="info-card primary">
                    <div class="info-icon primary">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">{{ $contact->phone ?? 'Non renseigné' }}</div>
                </div>

                {{-- Type de demande --}}
                <div class="info-card info">
                    <div class="info-icon info">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="info-label">Type de demande</div>
                    <div class="info-value">
                        <span class="type-badge">
                            <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                            {{ ucfirst($contact->type_demande) }}
                        </span>
                    </div>
                </div>

                {{-- Status --}}
                <div class="info-card warning">
                    <div class="info-icon warning">
                        <i class="fas fa-flag"></i>
                    </div>
                    <div class="info-label">Statut</div>
                    <div class="info-value">
                        <span class="status-badge status-{{ $contact->status === 'en_attente' ? 'en-attente' : ($contact->status === 'traitee' ? 'traitee' : 'default') }}">
                            <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                            {{ ucfirst(str_replace('_', ' ', $contact->status)) }}
                        </span>
                    </div>
                </div>

                {{-- Assigné à --}}
                <div class="info-card purple">
                    <div class="info-icon purple">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="info-label">Assigné à</div>
                    <div class="info-value">{{ $contact->assignedTo?->name ?? 'Aucun assignement' }}</div>
                </div>

                {{-- Propriété liée --}}
                <div class="info-card teal">
                    <div class="info-icon teal">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="info-label">Propriété liée</div>
                    <div class="info-value">{{ $contact->property?->title ?? 'Aucune propriété liée' }}</div>
                </div>

                {{-- Date de traitement --}}
                <div class="info-card success">
                    <div class="info-icon success">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    @if ($contact->status === 'traitee')
                    <div class="info-label">Traité le</div>
                    <div class="info-value">
                        {{ $contact->updated_at ? $contact->updated_at->format('d/m/Y à H:i') : 'Non traité' }}
                            
                    </div>
                    @else
                    <div class="info-label">Traité le</div>
                    <div class="info-value">Non traité</div>
                    
                    @endif
                </div>
            </div>

            {{-- Message --}}
            <div style="padding: 0 30px 30px;">
                <div class="info-card" style="border-left-color: #667eea;">
                    <div class="info-icon primary">
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class="info-label">Message du contact</div>
                    <div class="message-container">
                        <p class="message-text">{{ $contact->message }}</p>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="action-buttons" style="padding-bottom: 30px;">
                <a href="{{ route('contacts.index') }}" class="btn-modern btn-secondary-modern">
                    <i class="fas fa-arrow-left"></i>
                    Retour à la liste
                </a>
                {{-- <a href="#" class="btn-modern btn-primary-modern">
                    <i class="fas fa-edit"></i>
                    Modifier le contact
                </a> --}}
            </div>
        </div>
    </div>

    <footer class="app-footer mt-4">
        <div class="container-xl text-center">
            <small class="text-muted">&copy; {{ date('Y') }} Tawfekh-Immo</small>
        </div>
    </footer>   
</div><!--//app-wrapper-->
</body>
</html>