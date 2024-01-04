// Fonction pour activer/désactiver le menu
function toggleMenu() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
    
    var menuButton = document.getElementById('menu-button');
    menuButton.classList.toggle('active');
    
    var content = document.getElementById('content');
    content.classList.toggle('active');
  }
  // JavaScript pour remplacer les liens par des boutons
  window.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('nav.navbar a');
    links.forEach(function(link) {
      var button = document.createElement('button');
      button.innerHTML = link.innerHTML;
      button.addEventListener('click', function() {
        window.location.href = link.href;
      });
      link.parentNode.replaceChild(button, link);
    });
  });
  