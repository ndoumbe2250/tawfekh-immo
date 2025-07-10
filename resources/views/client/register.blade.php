<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Immobilier</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .signup-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: flex;
            min-height: 600px;
        }
        
        .image-section {
            flex: 1;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9)), 
                        url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect fill="%23f0f8ff" width="400" height="300"/><polygon fill="%234a90e2" points="50,250 200,100 350,250"/><rect fill="%23e74c3c" x="160" y="200" width="80" height="50"/><rect fill="%23f39c12" x="180" y="180" width="20" height="20"/><rect fill="%238e44ad" x="220" y="180" width="20" height="20"/><polygon fill="%2327ae60" points="100,250 100,200 150,200 150,220 130,220 130,250"/><circle fill="%23f1c40f" cx="320" cy="80" r="25"/><polygon fill="%2327ae60" points="60,250 90,250 90,230 80,230 80,240 70,240 70,230 60,230"/></svg>') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: white;
            text-align: center;
            position: relative;
        }
        
        .image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><defs><linearGradient id="skyGrad" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color:%2387CEEB;stop-opacity:1" /><stop offset="100%" style="stop-color:%23E0F6FF;stop-opacity:1" /></linearGradient></defs><rect fill="url(%23skyGrad)" width="800" height="400"/><rect fill="%2334C759" y="400" width="800" height="200"/><g transform="translate(150,250)"><polygon fill="%23E74C3C" points="0,100 200,0 400,100 400,150 0,150"/><rect fill="%23D35400" x="50" y="100" width="300" height="100"/><rect fill="%238B4513" x="150" y="130" width="40" height="70"/><rect fill="%23F39C12" x="80" y="130" width="30" height="30"/><rect fill="%23F39C12" x="240" y="130" width="30" height="30"/><polygon fill="%2327AE60" points="320,200 360,180 380,200 380,220 320,220"/></g><circle fill="%23F1C40F" cx="650" cy="80" r="40"/><g fill="%23228B22"><ellipse cx="100" cy="450" rx="40" ry="30"/><ellipse cx="700" cy="480" rx="35" ry="25"/><ellipse cx="500" cy="470" rx="30" ry="20"/></g></svg>') center/cover;
            opacity: 0.3;
        }
        
        .image-content {
            position: relative;
            z-index: 1;
        }
        
        .house-icon {
            font-size: 4rem;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .form-title {
            color: #333;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        
        .form-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-control {
            height: 50px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            padding-left: 50px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }
        
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            z-index: 1;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            z-index: 1;
        }
        
        .btn-create {
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        .btn-create:active {
            transform: translateY(0);
        }
        
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
        }
        
        .divider span {
            background: white;
            padding: 0 1rem;
            color: #999;
            font-size: 14px;
        }
        
        .social-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .btn-social {
            flex: 1;
            height: 45px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-social:hover {
            border-color: #667eea;
            color: #667eea;
            transform: translateY(-2px);
        }
        
        .btn-google:hover {
            border-color: #db4437;
            color: #db4437;
        }
        
        .btn-facebook:hover {
            border-color: #3b5998;
            color: #3b5998;
        }
        
        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
        
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .checkbox-container input[type="checkbox"] {
            margin-right: 0.5rem;
            transform: scale(1.2);
        }
        
        .checkbox-container label {
            font-size: 14px;
            color: #666;
            margin: 0;
        }
        
        .checkbox-container a {
            color: #667eea;
            text-decoration: none;
        }
        
        .checkbox-container a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
                margin: 10px;
            }
            
            .image-section {
                min-height: 200px;
                padding: 20px;
            }
            
            .form-section {
                padding: 30px 20px;
            }
            
            .house-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
        }
        
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .form-error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        
        .form-control.error {
            border-color: #e74c3c;
        }
        
        .form-control.success {
            border-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <!-- Section Image -->
        <div class="image-section">
            <div class="image-content">
                <div class="house-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h2 class="mb-3">Bienvenue chez nous</h2>
                <p class="mb-4">Trouvez la maison de vos rêves avec notre plateforme immobilière de confiance</p>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="me-4">
                        <i class="fas fa-shield-alt fa-2x mb-2"></i>
                        <p class="small">Sécurisé</p>
                    </div>
                    <div class="me-4">
                        <i class="fas fa-users fa-2x mb-2"></i>
                        <p class="small">Communauté</p>
                    </div>
                    <div>
                        <i class="fas fa-star fa-2x mb-2"></i>
                        <p class="small">Qualité</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section Formulaire -->
        <div class="form-section">
            <h1 class="form-title">Créer un compte</h1>
            <p class="form-subtitle">Rejoignez notre communauté immobilière</p>
            
            <!-- Boutons sociaux -->
            <div class="social-buttons">
                <a href="#" class="btn-social btn-google">
                    <i class="fab fa-google me-2"></i>
                    Google
                </a>
                <a href="#" class="btn-social btn-facebook">
                    <i class="fab fa-facebook-f me-2"></i>
                    Facebook
                </a>
            </div>
            
            <div class="divider">
                <span>ou avec votre email</span>
            </div>
            
            <!-- Formulaire -->
            <form id="signupForm" method="POST" action="{{ route('client.register.post') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text" 
                                   class="form-control" 
                                   id="firstName" 
                                   name="prenom" 
                                   placeholder="Prénom" 
                                   required>
                            <div class="form-error" id="firstNameError"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text" 
                                   class="form-control" 
                                   id="lastName" 
                                   name="nom" 
                                   placeholder="Nom" 
                                   required>
                            <div class="form-error" id="lastNameError"></div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           placeholder="Adresse email" 
                           required>
                    <div class="form-error" id="emailError"></div>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-phone form-icon"></i>
                    <input type="tel" 
                           class="form-control" 
                           id="phone" 
                           name="phone" 
                           placeholder="Numéro de téléphone">
                    <div class="form-error" id="phoneError"></div>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           placeholder="Mot de passe" 
                           required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('password')"></i>
                    <div class="form-error" id="passwordError"></div>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" 
                           class="form-control" 
                           id="confirmPassword" 
                           name="password_confirmation" 
                           placeholder="Confirmer le mot de passe" 
                           required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('confirmPassword')"></i>
                    <div class="form-error" id="confirmPasswordError"></div>
                </div>
{{--                 
                <div class="form-group">
                    <i class="fas fa-user-tag form-icon"></i>
                    <select class="form-control" id="userType" name="user_type" required>
                        <option value="">Sélectionnez votre profil</option>
                        <option value="client">Client</option>
                        <option value="agent">Agent immobilier</option>
                        <option value="proprietaire">Propriétaire</option>
                    </select>
                    <div class="form-error" id="userTypeError"></div>
                </div> --}}
                
                <div class="checkbox-container">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        J'accepte les <a href="#" target="_blank">conditions d'utilisation</a> 
                        et la <a href="#" target="_blank">politique de confidentialité</a>
                    </label>
                </div>
                
                <div class="checkbox-container">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">
                        Je souhaite recevoir les dernières actualités et offres
                    </label>
                </div>
                
                <button type="submit" class="btn btn-create w-100">
                    <span class="btn-text">Créer mon compte</span>
                    <div class="loading-spinner"></div>
                </button>
            </form>
            
            <div class="login-link">
                <p>Vous avez déjà un compte ? <a href="{{ route('client.login') }}">Se connecter</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fonction pour basculer la visibilité du mot de passe
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    
        
        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorDiv = document.getElementById(fieldId + 'Error');
            
            field.classList.add('error');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }
        
        function clearErrors() {
            const errorDivs = document.querySelectorAll('.form-error');
            const fields = document.querySelectorAll('.form-control');
            
            errorDivs.forEach(div => {
                div.style.display = 'none';
                div.textContent = '';
            });
            
            fields.forEach(field => {
                field.classList.remove('error', 'success');
            });
        }
        
        // Validation en temps réel
        document.querySelectorAll('.form-control').forEach(field => {
            field.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    this.classList.remove('error');
                    const errorDiv = document.getElementById(this.id + 'Error');
                    if (errorDiv) {
                        errorDiv.style.display = 'none';
                    }
                }
                
                // Ajouter la classe success si le champ est valide
                if (this.value.trim() !== '') {
                    this.classList.add('success');
                } else {
                    this.classList.remove('success');
                }
            });
        });
    </script>
</body>
</html>