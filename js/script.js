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
    
    
})(jQuery);