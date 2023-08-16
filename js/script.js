// MODALE 

(function($) {
  'use strict'; // mm erreurs courantes traitées, code +sûr et -sujet à des erreurs silencieuses
  var modal = document.getElementById('myModal');
  const btn = document.querySelectorAll('.myBtn')
  btn.forEach(function(button ) {
      button.addEventListener('click', function(e){
        e.preventDefault();
  
        modal.style.display = "block";
      });
  
  })

// fermer modale 
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";}} 

// rèf
$(document).ready(function(){
      $(".ref").val($('#ref-photo').text());
    });
    
// MENU BURGER 
const burgerMenu = document.querySelector('.burger-menu');
const menuH = document.querySelector('.menu-h');

burgerMenu.addEventListener('click', () => {
  menuH.classList.toggle('menu-active');
  document.body.classList.toggle('menu-active'); // Ajoute la classe au body
});

// ACCUEIL 

$(document).ready(function () {
  var page = 2; // Le numéro de la page à charger

  $('#load-more').on('click', function () {
    var data = {
      action: 'load_more_photos', // Action pour le serveur
      page: page
    };

    $.ajax({
      url: ajaxurl, // Variable ajaxurl définie par WordPress
      data: data,
      type: 'POST',
      success: function (response) {
        $('.photos_accueil').append(response); // Ajouter les nouvelles photos
        page++;
      }
    });
  });

});

})(jQuery);

