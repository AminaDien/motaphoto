document.addEventListener("DOMContentLoaded", function() {
  const lightbox = document.getElementById("lightbox");
  const closeButton = document.getElementById("close-lightbox");
  const prevButton = document.querySelector(".lightbox_prev");
  const nextButton = document.querySelector(".lightbox_next");
  const openButton = document.querySelectorAll(".open-lightbox");

  // ouverture lightbox
  openButton.forEach(function(button){
    button.addEventListener('click', function(){
        const imgUrl = button.getAttribute("data-img-url");
        const lightboxContent = document.querySelector(".lightbox_content");
        lightboxContent.innerHTML = `<img src="${imgUrl}" alt="image">`;
        lightbox.style.display = "block";
        let imagecateg = button.getAttribute('data-categ');
        let lightboxcateg = lightbox.querySelector('.lightbox__categ');
        lightboxcateg.textContent = imagecateg;
  });
});

// Ajouter un tableau pour stocker les URLs des images
const imageUrls = Array.from(openButton).map(button => button.getAttribute("data-img-url"));
let currentIndex = 0;
console.log(imageUrls);

// Fonction pour mettre à jour le contenu de la lightbox avec une image
function updateLightboxContentWithImage(url) {
  const lightboxContent = document.querySelector(".lightbox_content");
  lightboxContent.innerHTML = `<img src="${url}" alt="image">`;
  lightbox.style.display = "block";
}

// Gestionnaire pour le bouton Suivante
nextButton.addEventListener("click", function() {
  currentIndex = (currentIndex + 1) % imageUrls.length;
  updateLightboxContentWithImage(imageUrls[currentIndex]);
});

// Gestionnaire pour le bouton Précédente
prevButton.addEventListener("click", function() {
  currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
  updateLightboxContentWithImage(imageUrls[currentIndex]);
});

  // Fermer la lightbox 
  closeButton.addEventListener("click", function() {
    lightbox.style.display = "none";
  });

});
