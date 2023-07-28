// Récupérer la référence du bouton "Supprimer"
const deleteButton = document.getElementById("avertSupp");

// Récupérer la référence de la modal
const modal = document.getElementById("modal");

// Récupérer la référence des boutons de la modal
const confirmButton = document.getElementById("confirmDelete");
const cancelButton = document.getElementById("cancelDelete");

// Fonction pour afficher la modal
function showModal() {
  modal.classList.add("modal-visible");
}

// Fonction pour masquer la modal
function hideModal() {
  modal.classList.remove("modal-visible");
}

// Ajouter un événement au clic sur le bouton "Supprimer"
deleteButton.addEventListener("click", showModal);

// Ajouter un événement au clic sur le bouton "Supprimer" dans la modal
confirmButton.addEventListener("click", function () {
  // Ici, vous pouvez insérer votre code de suppression
  // Remplacez le console.log par le code de suppression réel
  console.log("Suppression effectuée !");
  hideModal();
});

// Ajouter un événement au clic sur le bouton "Annuler" dans la modal
cancelButton.addEventListener("click", hideModal);

// Masquer la modal lorsqu'on clique en dehors de la fenêtre de la modal
window.addEventListener("click", function (event) {
  if (event.target === modal) {
    hideModal();
  }
});
