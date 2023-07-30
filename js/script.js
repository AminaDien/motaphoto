// MODALE 

(function($) {
  'use strict'; // mm erreurs courantes traitées, code +sûr et -sujet à des erreurs silencieuses
let modal = document.getElementById('myModal');



// fermer modale 
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";}} 

  
// MENU 

// SINGLE 

// bouton contact


// rèf
$(document).ready(function(){
      $(".ref").val($('#ref-photo').text());
    });
    
})(jQuery);