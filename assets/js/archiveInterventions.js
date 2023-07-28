// Récupérer la référence de la modal
const modal = document.getElementById("modal");

// Fonction pour afficher la modal
function showModal() {
  modal.classList.add("modal-visible");
}

// Fonction pour masquer la modal
function hideModal() {
  modal.classList.remove("modal-visible");
}

// Masquer la modal lorsqu'on clique en dehors de la fenêtre de la modal
window.addEventListener("click", function (event) {
  if (event.target === modal) {
    hideModal();
  }
});
