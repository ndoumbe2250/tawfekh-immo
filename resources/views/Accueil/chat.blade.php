<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Interface de Chat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .chat-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        
        .chat-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .chat-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        .chat-header h4 {
            margin: 0;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .online-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            background: #4CAF50;
            border-radius: 50%;
            margin-left: 10px;
            animation: blink 2s infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }
        
        .message {
            margin-bottom: 1rem;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .message.sent {
            text-align: right;
        }
        
        .message.received {
            text-align: left;
        }
        
        .message-bubble {
            display: inline-block;
            max-width: 70%;
            padding: 0.75rem 1rem;
            border-radius: 18px;
            word-wrap: break-word;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .message-bubble:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .message.sent .message-bubble {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom-right-radius: 5px;
        }
        
        .message.received .message-bubble {
            background: white;
            color: #333;
            border: 1px solid #e9ecef;
            border-bottom-left-radius: 5px;
        }
        
        .message-time {
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }
        
        .chat-input {
            padding: 1rem;
            background: white;
            border-top: 1px solid #e9ecef;
        }
        
        .input-group {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .form-control {
            border: none;
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: transparent;
        }
        
        .btn-send {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .typing-indicator {
            display: none;
            align-items: center;
            padding: 0.5rem 1rem;
            color: #6c757d;
            font-style: italic;
        }
        
        .typing-dots {
            display: flex;
            margin-left: 0.5rem;
        }
        
        .typing-dots span {
            height: 8px;
            width: 8px;
            background: #6c757d;
            border-radius: 50%;
            margin: 0 2px;
            animation: typing 1.4s infinite ease-in-out;
        }
        
        .typing-dots span:nth-child(1) { animation-delay: 0s; }
        .typing-dots span:nth-child(2) { animation-delay: 0.2s; }
        .typing-dots span:nth-child(3) { animation-delay: 0.4s; }
        
        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-10px); }
        }
        
        .emoji-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #6c757d;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .emoji-btn:hover {
            transform: scale(1.2);
            color: #667eea;
        }
        .spinner-border-sm {
                width: 1rem;
                height: 1rem;
                border-width: 0.15em;
            }        
        @media (max-width: 768px) {
            .chat-container {
                height: 100vh;
                border-radius: 0;
            }
            
            .message-bubble {
                max-width: 85%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid h-100 p-3">
        <div class="row h-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="chat-container">
                    <!-- En-tête du chat -->
                    <div class="chat-header">
                        <h4>
                            <i class="fas fa-comments me-2"></i>
                            Chat Interface
                            <span class="online-indicator"></span>
                        </h4>
                    </div>
                    
                    <!-- Messages -->
                    <div class="chat-messages" id="chatMessages">
                        <div class="message received">
                            <div class="message-bubble">
                                Bonjour! Comment allez-vous aujourd'hui?
                            </div>
                            <div class="message-time">10:30 AM</div>
                        </div>
                        
                        <div class="message sent">
                            <div class="message-bubble">
                                Salut! Ça va bien, merci. Et vous?
                            </div>
                            <div class="message-time">10:32 AM</div>
                        </div>
                        
                        <div class="message received">
                            <div class="message-bubble">
                                Très bien aussi! Cette interface de chat est vraiment élégante 😊
                            </div>
                            <div class="message-time">10:33 AM</div>
                        </div>
                        
                        <!-- Indicateur de frappe -->
                        <div class="typing-indicator" id="typingIndicator">
                            <span>En train d'écrire</span>
                            <div class="typing-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Zone de saisie -->
                    <div class="chat-input">
                        <div class="input-group">
                            <button class="emoji-btn" type="button" title="Ajouter un emoji">
                                <i class="far fa-smile"></i>
                            </button>
                            {{-- <form action="{{ route('accueil.chat.post') }}" method="post">
                                @csrf
                                <input type="text" class="form-control" id="messageInput" name="message" placeholder="Tapez votre message...">
                                <button class="btn btn-send" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form> --}}
                            <input type="text" class="form-control" id="messageInput" placeholder="Tapez votre message...">
                            <button class="btn btn-send" type="button" id="sendBtn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        const chatMessages = document.getElementById('chatMessages');
        const messageInput = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        const typingIndicator = document.getElementById('typingIndicator');
        
        // Messages stockés en mémoire
        let messages = [];
        
        // Fonction pour obtenir l'heure actuelle
        function getCurrentTime() {
            const now = new Date();
            return now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
        }
        
        // Fonction pour ajouter un message
         function addMessage(text, type = 'sent') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;
        messageDiv.innerHTML = `
            <div class="message-bubble">${text}</div>
            <div class="message-time">${getCurrentTime()}</div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
        
        // Fonction pour afficher l'indicateur de frappe
        function showTypingIndicator() {
            typingIndicator.style.display = 'flex';
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        // Fonction pour masquer l'indicateur de frappe
        function hideTypingIndicator() {
            typingIndicator.style.display = 'none';
        }
        
        // Fonction pour envoyer un message
         function sendMessage() {
        const text = messageInput.value.trim();
        if (!text) return;

        console.log(`Message envoyé: ${text}`);
        addMessage(text, 'sent');
        messageInput.value = '';
        showTypingIndicator();

        fetch('/chatagent', {
            method:'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: text })
        })
        .then(response => response.json())
        .then(data => {
            hideTypingIndicator();
            addMessage(data.reply ?? "Je n'ai pas compris...", 'received');
        })
        .catch(() => {
            hideTypingIndicator();
            addMessage("Erreur de connexion au serveur.", 'received');
        });
    }
        
        // Événements
        sendBtn.addEventListener('click', sendMessage);
        
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
        
        // Focus automatique sur le champ de saisie
        messageInput.focus();
        
        // Simulation d'activité
        setTimeout(() => {
            addMessage("N'hésitez pas à taper un message pour tester l'interface! ✨", 'received');
        }, 2000);
    </script>
</body>
</html>