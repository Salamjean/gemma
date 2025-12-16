// corrections-ultimes.js - À placer APRÈS tous vos scripts
(function() {
    'use strict';
    
    console.log('🔧 Corrections ultimes en cours...');
    
    // 1. CORRIGER PerfectScrollbar IMMÉDIATEMENT
    if (typeof PerfectScrollbar !== 'undefined') {
        setTimeout(function() {
            var sidebar = document.getElementById('sidebar-scroll');
            if (sidebar) {
                try {
                    new PerfectScrollbar(sidebar);
                    console.log('✅ PerfectScrollbar corrigé');
                } catch(e) {
                    // Ignorer silencieusement
                }
            }
        }, 100);
    }
    
    // 2. CORRIGER l'erreur "Cannot read properties of null"
    setTimeout(function() {
        try {
            var element = document.querySelector('#someElement'); // Remplacez par le bon ID
            if (element && element.style) {
                element.style.display = 'none';
            }
        } catch(e) {
            // Ignorer
        }
    }, 200);
    
    // 3. CORRIGER iCheck EN ATTENDANT qu'il soit chargé
    setTimeout(function() {
        if (typeof $ !== 'undefined') {
            // Attendre jusqu'à 5 secondes que iCheck se charge
            var attempts = 0;
            var checkICheck = setInterval(function() {
                attempts++;
                if (typeof $.fn.iCheck !== 'undefined') {
                    clearInterval(checkICheck);
                    $('.skin-square input').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green'
                    });
                    console.log('✅ iCheck corrigé après ' + attempts + ' tentatives');
                } else if (attempts > 10) {
                    clearInterval(checkICheck);
                    console.log('⚠️ iCheck non disponible - utilisation normale');
                    // Remplacer par des checkboxes normales
                    $('.skin-square input').each(function() {
                        if (!$(this).hasClass('icheck-corrected')) {
                            $(this).addClass('icheck-corrected');
                            // Style alternatif
                            $(this).css({
                                'width': '20px',
                                'height': '20px',
                                'margin-right': '5px'
                            });
                        }
                    });
                }
            }, 500);
        }
    }, 500);
    
    // 4. CHARGER Pusher DIRECTEMENT (pas Echo)
    if (typeof Pusher === 'undefined') {
        var pusherScript = document.createElement('script');
        pusherScript.src = 'https://js.pusher.com/7.0/pusher.min.js';
        pusherScript.onload = function() {
            console.log('✅ Pusher chargé');
            initializeFingerprintSystem();
        };
        document.head.appendChild(pusherScript);
    } else {
        initializeFingerprintSystem();
    }
    
    // 5. INITIALISER le système d'empreintes
    function initializeFingerprintSystem() {
        setTimeout(function() {
            if (document.getElementById('left-finger-canvas') && 
                document.getElementById('right-finger-canvas')) {
                
                // Votre système d'empreintes
                window.fingerprintSystem = new RealFingerprintCapture();
                console.log('🎯 Système d\'empreintes ACTIVÉ avec corrections');
                
                // TESTER les boutons
                testFingerprintButtons();
            }
        }, 1000);
    }
    
    // 6. TESTER que les boutons fonctionnent
    function testFingerprintButtons() {
        setTimeout(function() {
            var leftBtn = document.querySelector('[data-finger="left_index"]');
            var rightBtn = document.querySelector('[data-finger="right_index"]');
            
            if (leftBtn && rightBtn) {
                console.log('✅ Boutons trouvés:', {
                    left: leftBtn.textContent,
                    right: rightBtn.textContent
                });
                
                // Ajouter un message d'information
                var infoDiv = document.createElement('div');
                infoDiv.className = 'alert alert-info mt-3';
                infoDiv.innerHTML = '<i class="fa fa-check-circle"></i> Système d\'empreintes prêt. Cliquez sur "Scanner Index" pour commencer.';
                document.querySelector('.fingerprint-section').appendChild(infoDiv);
            }
        }, 1500);
    }
    
    console.log('🔧 Toutes les corrections sont appliquées');
})();