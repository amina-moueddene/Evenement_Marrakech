<!DOCTYPE html>
<html lang="en">
   <head>

@include('home.css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

       </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
      @include('home.header')

      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      @include('home.slider')

      <!-- end banner -->
      <!-- about -->
      @include('home.about')

      <!-- end about -->
      @include('home.event')

      @include('home.gallary')

      @include('home.blog')
      @include('home.contact')
      @include('home.footer')
      <!-- Javascript files-->
      


<!-- Script de gestion des notifications à ajouter dans index.blade.php -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour charger le nombre de notifications non lues
    function loadNotificationCount() {
        fetch('/notifications/unread-count')
            .then(response => response.json())
            .then(data => {
                const countElement = document.getElementById('notification-count');
                countElement.textContent = data.count;
                
                // Afficher ou masquer le badge en fonction du nombre
                if (data.count > 0) {
                    countElement.style.display = 'inline';
                } else {
                    countElement.style.display = 'none';
                }
            });
    }

    // Fonction pour charger la liste des notifications
    function loadNotificationsList() {
        fetch('/notifications')
            .then(response => response.json())
            .then(notifications => {
                const list = document.getElementById('notifications-list');
                list.innerHTML = '';
                
                if (notifications.length === 0) {
                    list.innerHTML = '<div class="p-3 text-center">Aucune notification</div>';
                    return;
                }
                
                notifications.forEach(n => {
                    const item = document.createElement('a');
                    item.href = n.link;
                    item.className = 'dropdown-item d-flex align-items-center p-2' + (n.read_at ? '' : ' fw-bold');
                    item.style.borderBottom = '1px solid #eee';
                    
                    item.innerHTML = `
                        <div class="me-3">
                            <i class="bi bi-bell-fill ${n.read_at ? 'text-muted' : 'text-primary'}"></i>
                        </div>
                        <div>
                            <div class="${n.read_at ? '' : 'fw-bold'}">${n.title}</div>
                            <div class="small text-muted">${timeAgo(new Date(n.created_at))}</div>
                        </div>
                    `;
                    
                    item.onclick = function (e) {
                        e.preventDefault();
                        fetch(`/notifications/${n.id}/read`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        }).then(() => {
                            window.location.href = n.link;
                        });
                    };
                    
                    list.appendChild(item);
                });
            });
    }
    
    // Fonction helper pour afficher le temps écoulé
    function timeAgo(date) {
        const seconds = Math.floor((new Date() - date) / 1000);
        
        let interval = Math.floor(seconds / 31536000);
        if (interval >= 1) {
            return interval + ' an' + (interval > 1 ? 's' : '');
        }
        
        interval = Math.floor(seconds / 2592000);
        if (interval >= 1) {
            return interval + ' mois';
        }
        
        interval = Math.floor(seconds / 86400);
        if (interval >= 1) {
            return interval + ' jour' + (interval > 1 ? 's' : '');
        }
        
        interval = Math.floor(seconds / 3600);
        if (interval >= 1) {
            return interval + ' heure' + (interval > 1 ? 's' : '');
        }
        
        interval = Math.floor(seconds / 60);
        if (interval >= 1) {
            return interval + ' minute' + (interval > 1 ? 's' : '');
        }
        
        return Math.floor(seconds) + ' seconde' + (seconds > 1 ? 's' : '');
    }

    // Marquer toutes les notifications comme lues
    document.getElementById('mark-all-read')?.addEventListener('click', function(e) {
        e.stopPropagation(); // Empêcher la fermeture du dropdown
        
        fetch('/notifications/mark-all-read', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        }).then(() => {
            loadNotificationCount();
            loadNotificationsList();
        });
    });

    // Charger le nombre de notifications au chargement de la page
    loadNotificationCount();
    
    // Rafraîchir les notifications toutes les 30 secondes
    setInterval(loadNotificationCount, 30000);
    
    // Initialiser les dropdowns Bootstrap
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
    });
    
    // Alternative pour charger les notifications au clic sur l'icône
    document.getElementById('navbarDropdown').addEventListener('click', function() {
        loadNotificationsList();
    });
});
</script>


<script>
   $(window).on("scroll", function () {
  sessionStorage.scrollTop = $(this).scrollTop(); 
});

$(document).ready(function () {
  if (sessionStorage.scrollTop !== undefined) { 
    $(window).scrollTop(sessionStorage.scrollTop); 
  }
});

</script>
   </body>
</html>