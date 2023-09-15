// Ouverture du dom:
document.addEventListener("DOMContentLoaded", () => {
  // CONST Modal arrivée:
  const arrivalButton = document.getElementById("arrivalButton");
  const endButton = document.getElementById("endButton");
  const arrivalMessage = document.getElementById("arrivalMessage");
  const modal = document.getElementById("myModalArrival");

  // CONST Modal Départ:
  const modalDepart = document.getElementById("myModalDepart");
  const endMessage = document.getElementById("endMessage");
  const endCloseButton = document.getElementById("endCloseButton");

  // CONST modal Signalement:
  const openUploadButton = document.getElementById("openUploadModal");
  const modalUpload = document.getElementById("myModalUpload");
  const cancelButton = document.getElementById("UploadCloseButton");

  // CONST bouton input:
  const uploadButtonTest = document.getElementById("uploadButtonTest");
  const fileInput = document.getElementById("fileUpload");
  const fileCountText = document.getElementById("fileCountText");

  /*-----DÉCLARATION DES ÉVÉNEMENTS-----*/

  // JS bouton ouverture arrivée:
  arrivalButton.addEventListener("click", () => {
    const now = new Date();
    const currentTime = now.toLocaleTimeString();
    arrivalMessage.textContent = `Nous sommes le ${now.toLocaleDateString()}, il est ${currentTime}, nous avons bien pris en compte votre arrivée sur les lieux. Bonne intervention à vous !`;
    modal.style.display = "block";
  });

  // JS Fermeture modal arrivée:
  arrivalCloseButton.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // JS bouton ouverture départ:
  endButton.addEventListener("click", () => {
    const now = new Date();
    const currentTime = now.toLocaleTimeString();
    endMessage.textContent = `Nous sommes le ${now.toLocaleDateString()}, il est ${currentTime}, nous avons bien pris en compte votre départ. Merci pour votre intervention et bonne journée.`;
    modalDepart.style.display = "block";
  });

  // JS Bouton fermeture départ:
  endCloseButton.addEventListener("click", () => {
    modalDepart.style.display = "none";
  });

  // JS Bouton click pour upload le/les fichier(s):
  uploadButtonTest.addEventListener("click", function (event) {
    event.preventDefault();
    fileInput.click();
  });

  // JS fonction permettant l'indication du nombre de fichier:
  fileInput.addEventListener("change", function () {
    const selectedFiles = fileInput.files;
    const fileCount = selectedFiles.length;
    if (fileCount > 0) {
      modalUpload.style.display = "block";
      fileCountText.textContent = `${fileCount} fichier(s) sélectionné(s)`;
    } else {
      modalUpload.style.display = "none";
    }
  });

  // JS Bouton ouverture signalement:
  openUploadButton.addEventListener("click", () => {
    // Réinitialisez le texte du compteur de fichiers lorsque vous ouvrez la modal
    fileCountText.textContent = "Aucun fichier sélectionné";
    modalUpload.style.display = "block";
  });

  // JS Bouton annuler signalement:
  cancelButton.addEventListener("click", () => {
    modalUpload.style.display = "none";
  });

  // Écouteur de vérification hors modal:
  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});
