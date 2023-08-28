document.addEventListener("DOMContentLoaded", function() {
  const lightbox = document.getElementById("lightbox");
  const closeButton = document.getElementById("close-lightbox");
  const prevButton = document.querySelector(".lightbox_prev");
  const nextButton = document.querySelector(".lightbox_next");
  const openButton = document.querySelectorAll(".open-lightbox");

  // ouverture lightbox
  openButton.forEach(function(button) {
    button.addEventListener('click', function() {
      const imgUrl = button.getAttribute("data-img-url");
      const lightboxContent = document.querySelector(".lightbox_content");
      lightboxContent.innerHTML = `<img src="${imgUrl}" alt="image">`;
      lightbox.style.display = "block";
      let imageRef = button.getAttribute('data-ref');
      let lightboxRef = lightbox.querySelector('.lightboxref');
      lightboxRef.textContent = `${imageRef}`;
      let imageCateg = button.getAttribute('data-categ');
      let lightboxCateg = lightbox.querySelector('.lightbox__categ');
      lightboxCateg.textContent = `${imageCateg}`;
    });
  });

// Ajouter un tableau pour stocker les URLs des images
const imageUrls = Array.from(openButton).map(button => button.getAttribute("data-img-url"));
let currentIndex = 0;

// Fonction pour mettre à jour le contenu de la lightbox avec une image, une référence et une catégorie
function updateLightboxContentWithImage(url, ref, categ) {
  const lightboxContent = document.querySelector(".lightbox_content");
  lightboxContent.innerHTML = `<img src="${url}" alt="image">`;
  lightbox.style.display = "block";
  const lightboxRef = document.querySelector(".lightboxref");
  lightboxRef.textContent = `${ref}`;
  const lightboxCateg = document.querySelector(".lightbox__categ");
  lightboxCateg.textContent = `${categ}`;
}

// Gestionnaire pour le bouton Suivante
nextButton.addEventListener("click", function() {
  currentIndex = (currentIndex + 1) % imageUrls.length;
  const currentImage = openButton[currentIndex];
  const imageUrl = currentImage.getAttribute("data-img-url");
  const imageRef = currentImage.getAttribute("data-ref");
  const imageCateg = currentImage.getAttribute("data-categ");
  updateLightboxContentWithImage(imageUrl, imageRef, imageCateg);
});

// Gestionnaire pour le bouton Précédente
prevButton.addEventListener("click", function() {
  currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
  const currentImage = openButton[currentIndex];
  const imageUrl = currentImage.getAttribute("data-img-url");
  const imageRef = currentImage.getAttribute("data-ref");
  const imageCateg = currentImage.getAttribute("data-categ");
  updateLightboxContentWithImage(imageUrl, imageRef, imageCateg);
});

  // Fermer la lightbox 
  closeButton.addEventListener("click", function() {
    lightbox.style.display = "none";
  });

});
