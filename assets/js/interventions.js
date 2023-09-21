// Sélection des éléments HTML par leur classe ou ID et assignation à des variables
var infoIntervention = document.querySelectorAll(".infoIntervention");
var displayModal = document.getElementById("displayModal");
var deleteIntervention = document.querySelectorAll(".deleteIntervention");
var confirmDeleteModal = document.getElementById("confirmDeleteModal");
var interventionsList = document.querySelector(".interventionsList");

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

// En dessous ton ajax
