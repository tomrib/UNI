// Sélection des éléments HTML par leur classe ou ID et assignation à des variables
var infoEmployee = document.querySelectorAll(".infoEmployee");
var displayModal = document.getElementById("displayModal");
var deleteEmployee = document.querySelectorAll(".deleteEmployee");
var confirmDeleteModal = document.getElementById("confirmDeleteModal");
var listEmployee = document.querySelector(".liveList");

var closeModalButton = document.getElementById("closeModalButton");
var cancelDeleteModalButton = document.getElementById(
  "cancelDeleteModalButton"
);

// Ajout d'événement "click" à closeModalButton
closeModalButton.addEventListener("click", () => {
  displayModal.style.display = "none";
  // Masque la modal displayModal
});

// Ajout d'événement "click" à cancelDeleteModalButton
cancelDeleteModalButton.addEventListener("click", () => {
  confirmDeleteModal.style.display = "none";
  // Masque la modal confirmDeleteModal
});
