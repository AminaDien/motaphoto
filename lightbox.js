document.addEventListener("DOMContentLoaded", function() {
  const lightbox = document.getElementById("lightbox");
  const closeButton = document.getElementById("close-lightbox");
  const prevButton = document.querySelector(".lightbox_prev");
  const nextButton = document.querySelector(".lightbox_next");

  
  // Fermer la lightbox en cliquant sur le bouton de fermeture
  closeButton.addEventListener("click", function() {
    lightbox.style.display = "none";
  });

  // Gérer la photo précédente
  prevButton.addEventListener("click", function() {
    // Ajoutez ici la logique pour afficher la photo précédente
  });

  // Gérer la photo suivante
  nextButton.addEventListener("click", function() {
    // Ajoutez ici la logique pour afficher la photo suivante
  });
});
