<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Patient - Système de Santé</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* Animation pour le fond */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #667eea, #764ba2);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        /* Animation pour le formulaire */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        /* Style pour le code patient */
        .code-input {
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
        }
        
        /* Loading spinner */
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Input OTP moderne */
        .otp-input-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }
        
        .otp-input {
            width: 50px;
            height: 60px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            transition: all 0.3s;
        }
        
        .otp-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        .otp-input.filled {
            border-color: #10b981;
            background-color: #f0fdf4;
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-2xl overflow-hidden fade-in">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-8 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-white p-3 rounded-full">
                        <i class="fas fa-user-md text-blue-600 text-3xl"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-extrabold text-white">
                    Connexion Patient
                </h2>
                <p class="mt-2 text-blue-100">
                    Entrez votre code patient pour recevoir un code de vérification
                </p>
            </div>

            <!-- Contenu principal -->
            <div class="px-8 py-6">
                <!-- Formulaire -->
                <form id="patientLoginForm" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="code_patient" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-id-card mr-2 text-blue-500"></i>
                            Code Patient
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-injured text-gray-400"></i>
                            </div>
                            <input 
                                id="code_patient" 
                                name="code_patient" 
                                type="text" 
                                required 
                                class="code-input pl-10 appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:z-10 sm:text-sm"
                                placeholder="Ex: PAT-2023-00123"
                                autocomplete="off"
                                autocapitalize="characters"
                                maxlength="50"
                            >
                        </div>
                        <p class="mt-2 text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            Saisissez le code patient qui vous a été attribué lors de votre inscription
                        </p>
                    </div>

                    <!-- Informations patient (affichées après vérification) -->
                    <div id="patientInfo" class="hidden p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <h4 class="font-medium text-blue-800 mb-2">
                            <i class="fas fa-user-circle mr-2"></i>
                            Informations patient
                        </h4>
                        <div class="space-y-2">
                            <p class="text-sm">
                                <span class="font-medium text-gray-700">Nom :</span>
                                <span id="patientName" class="ml-2"></span>
                            </p>
                            <p class="text-sm">
                                <span class="font-medium text-gray-700">Email :</span>
                                <span id="patientEmail" class="ml-2"></span>
                            </p>
                        </div>
                    </div>

                    <!-- Section OTP (affichée après envoi réussi) -->
                    <div id="otpSection" class="hidden">
                        <div class="p-4 bg-gradient-to-r from-green-50 to-blue-50 border border-green-200 rounded-lg">
                            <h4 class="font-medium text-green-800 mb-3 flex items-center">
                                <i class="fas fa-shield-alt mr-2"></i>
                                Code de vérification envoyé
                            </h4>
                            <p class="text-sm text-gray-700 mb-3">
                                Consultez votre boîte email et entrez le code à 6 chiffres que vous avez reçu.
                            </p>
                            
                            <!-- Input OTP moderne -->
                            <div class="otp-input-container" id="otpContainer">
                                <!-- Les inputs seront générés par JavaScript -->
                            </div>
                            
                            <div class="text-center mb-4">
                                <p class="text-sm text-gray-600">
                                    <i class="fas fa-clock mr-1"></i>
                                    Expire dans : <span id="otpTimer" class="font-bold text-red-600 ml-1">10:00</span>
                                </p>
                            </div>
                            
                            <div class="mt-4 flex space-x-3">
                                <button 
                                    type="button" 
                                    id="verifyOtpBtn"
                                    class="flex-1 inline-flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out"
                                >
                                    <i class="fas fa-check mr-2"></i>
                                    Vérifier le code
                                </button>
                                <button 
                                    type="button" 
                                    id="resendOtpBtn"
                                    class="flex-1 inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                                >
                                    <i class="fas fa-redo mr-2"></i>
                                    Renvoyer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton principal -->
                    <div>
                        <button 
                            type="submit" 
                            id="submitBtn"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                        >
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <span id="buttonText">
                                Recevoir le code par email
                            </span>
                            <span id="buttonSpinner" class="hidden ml-3">
                                <div class="spinner"></div>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Liens utiles -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="text-center space-y-3">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-question-circle mr-1"></i>
                            Vous ne trouvez pas votre code patient ?
                        </p>
                        <div class="flex justify-center space-x-4">
                            <button onclick="showSupportModal()" class="text-sm text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">
                                <i class="fas fa-phone-alt mr-1"></i>
                                Contactez le support
                            </button>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">
                                <i class="fas fa-hospital mr-1"></i>
                                Se rendre à l'hôpital
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pied de page -->
            <div class="bg-gray-50 px-8 py-4 text-center">
                <p class="text-xs text-gray-500">
                    <i class="fas fa-shield-alt mr-1"></i>
                    Votre sécurité est notre priorité. Toutes les données sont cryptées.
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    © {{ date('Y') }} Système de Santé. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let otpTimer;
        let timeLeft = 600; // 10 minutes en secondes
        let patientCode = '';
        let currentPatientName = '';
        let currentPatientEmail = '';

        // Initialiser les inputs OTP
        function initOtpInputs() {
            const container = document.getElementById('otpContainer');
            container.innerHTML = '';
            
            for (let i = 0; i < 6; i++) {
                const input = document.createElement('input');
                input.type = 'text';
                input.maxLength = 1;
                input.inputMode = 'numeric';
                input.pattern = '[0-9]*';
                input.className = 'otp-input';
                input.dataset.index = i;
                
                input.addEventListener('input', (e) => {
                    const value = e.target.value;
                    if (value.length === 1) {
                        e.target.classList.add('filled');
                        
                        // Passer au champ suivant
                        if (i < 5) {
                            const nextInput = container.querySelector(`[data-index="${i + 1}"]`);
                            nextInput.focus();
                        }
                    } else {
                        e.target.classList.remove('filled');
                    }
                    
                    // Retourner au champ précédent si on efface
                    if (value.length === 0 && i > 0) {
                        const prevInput = container.querySelector(`[data-index="${i - 1}"]`);
                        prevInput.focus();
                    }
                });
                
                input.addEventListener('keydown', (e) => {
                    // Permettre la navigation avec les flèches
                    if (e.key === 'ArrowLeft' && i > 0) {
                        const prevInput = container.querySelector(`[data-index="${i - 1}"]`);
                        prevInput.focus();
                    }
                    
                    if (e.key === 'ArrowRight' && i < 5) {
                        const nextInput = container.querySelector(`[data-index="${i + 1}"]`);
                        nextInput.focus();
                    }
                    
                    // Coller un code OTP complet
                    if (e.key === 'v' && (e.ctrlKey || e.metaKey)) {
                        e.preventDefault();
                    }
                });
                
                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text').trim();
                    if (/^\d{6}$/.test(pastedData)) {
                        const digits = pastedData.split('');
                        digits.forEach((digit, index) => {
                            if (index < 6) {
                                const inputField = container.querySelector(`[data-index="${index}"]`);
                                inputField.value = digit;
                                inputField.classList.add('filled');
                            }
                        });
                        // Focus sur le dernier champ
                        container.querySelector('[data-index="5"]').focus();
                    }
                });
                
                container.appendChild(input);
            }
            
            // Focus sur le premier champ
            container.querySelector('[data-index="0"]').focus();
        }

        // Récupérer le code OTP complet
        function getOtpCode() {
            const inputs = document.querySelectorAll('.otp-input');
            let code = '';
            inputs.forEach(input => {
                code += input.value;
            });
            return code;
        }

        // Démarrer le timer OTP
        function startOtpTimer() {
            const timerElement = document.getElementById('otpTimer');
            
            otpTimer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft <= 0) {
                    clearInterval(otpTimer);
                    showOtpExpiredModal();
                }
                
                timeLeft--;
            }, 1000);
        }

        // Modal support
        function showSupportModal() {
            Swal.fire({
                title: 'Contactez le support',
                html: `
                    <div class="text-left">
                        <p class="mb-3">Si vous ne trouvez pas votre code patient, vous pouvez :</p>
                        <div class="space-y-2">
                            <div class="flex items-start">
                                <i class="fas fa-phone text-blue-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium">Téléphone</p>
                                    <p class="text-gray-600">+225 27 22 44 55 66</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope text-blue-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium">Email</p>
                                    <p class="text-gray-600">support@santesystem.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-clock text-blue-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium">Horaires</p>
                                    <p class="text-gray-600">Lundi - Vendredi: 8h - 18h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Fermer',
                confirmButtonColor: '#667eea',
            });
        }

        // Modal OTP expiré
        function showOtpExpiredModal() {
            Swal.fire({
                title: 'Code expiré',
                text: 'Votre code OTP a expiré. Veuillez en demander un nouveau.',
                icon: 'error',
                confirmButtonText: 'Renvoyer',
                confirmButtonColor: '#667eea',
                showCancelButton: true,
                cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    resendOtp();
                }
            });
        }

        // Envoyer le code patient
        async function sendPatientCode() {
            const codePatient = document.getElementById('code_patient').value.trim();
            
            if (!codePatient) {
                Swal.fire({
                    title: 'Champ requis',
                    text: 'Veuillez entrer votre code patient',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#667eea',
                });
                return;
            }

            // Afficher le spinner
            const buttonText = document.getElementById('buttonText');
            const buttonSpinner = document.getElementById('buttonSpinner');
            buttonText.textContent = 'Vérification en cours...';
            buttonSpinner.classList.remove('hidden');
            
            try {
                const response = await fetch('/api/v1/patient/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify({ code: codePatient })
                });

                const data = await response.json();
                
                if (response.ok) {
                    patientCode = codePatient;
                    
                    // Afficher SweetAlert de succès
                    Swal.fire({
                        title: 'Code envoyé avec succès !',
                        html: `
                            <div class="text-center">
                                <div class="text-green-500 text-5xl mb-4">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p class="mb-3">Un code de vérification a été envoyé à votre adresse email.</p>
                                <p class="text-sm text-gray-600">Veuillez vérifier votre boîte de réception.</p>
                            </div>
                        `,
                        icon: 'success',
                        confirmButtonText: 'Continuer',
                        confirmButtonColor: '#10b981',
                    }).then(() => {
                        // Afficher la section OTP
                        document.getElementById('otpSection').classList.remove('hidden');
                        document.getElementById('patientInfo').classList.remove('hidden');
                        
                        // Initialiser les inputs OTP
                        initOtpInputs();
                        
                        // Démarrer le timer
                        startOtpTimer();
                        
                        // Mettre à jour le bouton
                        buttonText.textContent = 'Code envoyé ✓';
                        setTimeout(() => {
                            buttonText.textContent = 'Recevoir le code par email';
                        }, 2000);
                    });
                } else {
                    Swal.fire({
                        title: 'Erreur',
                        text: data.message || 'Une erreur est survenue',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ef4444',
                    });
                }
            } catch (error) {
                Swal.fire({
                    title: 'Erreur de connexion',
                    text: 'Impossible de se connecter au serveur',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444',
                });
                console.error('Error:', error);
            } finally {
                buttonSpinner.classList.add('hidden');
                buttonText.textContent = 'Recevoir le code par email';
            }
        }

        // Vérifier l'OTP
        async function verifyOtp() {
            const otpCode = getOtpCode();
            
            if (otpCode.length !== 6) {
                Swal.fire({
                    title: 'Code incomplet',
                    text: 'Veuillez entrer les 6 chiffres du code OTP',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#667eea',
                });
                return;
            }

            // Afficher le loader
            Swal.fire({
                title: 'Vérification en cours...',
                text: 'Veuillez patienter',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const response = await fetch('/api/v1/patient/confirm', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify({
                        code: patientCode,
                        password: otpCode
                    })
                });

                const data = await response.json();
                
                Swal.close();
                
                if (response.ok) {
                    // Arrêter le timer
                    clearInterval(otpTimer);
                    
                    // Afficher le succès
                    Swal.fire({
                        title: 'Connexion réussie !',
                        html: `
                            <div class="text-center">
                                <div class="text-green-500 text-5xl mb-4">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p class="mb-3">Bienvenue ${data.patient?.user?.name || ''} !</p>
                                <p class="text-sm text-gray-600">Vous allez être redirigé vers votre espace patient.</p>
                            </div>
                        `,
                        icon: 'success',
                        confirmButtonText: 'Accéder à mon espace',
                        confirmButtonColor: '#10b981',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: false,
                        preConfirm: () => {
                            return new Promise((resolve) => {
                                // Stocker le token
                                if (data.token) {
                                    localStorage.setItem('patient_token', data.token);
                                    localStorage.setItem('patient_data', JSON.stringify(data.patient));
                                }
                                
                                // Redirection après 2 secondes
                                setTimeout(() => {
                                    window.location.href = '/patient/dashboard';
                                    resolve();
                                }, 2000);
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Code incorrect',
                        text: data.message || 'Le code OTP est incorrect ou a expiré',
                        icon: 'error',
                        confirmButtonText: 'Réessayer',
                        confirmButtonColor: '#ef4444',
                    });
                }
            } catch (error) {
                Swal.close();
                Swal.fire({
                    title: 'Erreur de connexion',
                    text: 'Impossible de vérifier le code',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444',
                });
                console.error('Error:', error);
            }
        }

        // Renvoyer l'OTP
        async function resendOtp() {
            if (!patientCode) return;

            // Afficher le loader
            Swal.fire({
                title: 'Envoi en cours...',
                text: 'Veuillez patienter',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const response = await fetch('/api/patient/resend-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify({ code: patientCode })
                });

                const data = await response.json();
                
                Swal.close();
                
                if (response.ok) {
                    // Réinitialiser le timer
                    clearInterval(otpTimer);
                    timeLeft = 600;
                    startOtpTimer();
                    
                    // Réinitialiser les inputs OTP
                    initOtpInputs();
                    
                    // Afficher le succès
                    Swal.fire({
                        title: 'Code renvoyé !',
                        text: 'Un nouveau code a été envoyé à votre email',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#10b981',
                        timer: 2000,
                        timerProgressBar: true,
                    });
                } else {
                    Swal.fire({
                        title: 'Erreur',
                        text: data.message || 'Impossible de renvoyer le code',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ef4444',
                    });
                }
            } catch (error) {
                Swal.close();
                Swal.fire({
                    title: 'Erreur de connexion',
                    text: 'Impossible de se connecter au serveur',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444',
                });
                console.error('Error:', error);
            }
        }

        // Événements
        document.addEventListener('DOMContentLoaded', function() {
            // Soumission du formulaire
            document.getElementById('patientLoginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                sendPatientCode();
            });

            // Vérification OTP
            document.getElementById('verifyOtpBtn').addEventListener('click', verifyOtp);

            // Renvoi OTP
            document.getElementById('resendOtpBtn').addEventListener('click', resendOtp);

            // Auto-focus sur le code patient
            document.getElementById('code_patient').focus();
            
            // Permettre la soumission avec Enter sur le code patient
            document.getElementById('code_patient').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    sendPatientCode();
                }
            });
        });
    </script>
</body>
</html>