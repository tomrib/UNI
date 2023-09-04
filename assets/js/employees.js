// Fonction pour ouvrir la modal en mode édition
function openEditModal() {
  editProfileButton.style.display = "inline-block";
  deleteProfileButton.style.display = "inline-block";
  openModal();
}

// Fonction pour ouvrir la modal
function openModal() {
  modal.classList.add("modal-visible");
}

// Fonction pour fermer la modal
function closeModal() {
  modal.classList.remove("modal-visible");
  profileForm.reset();
}

// Écouteur d'événement pour le bouton de fermeture de la modal
closeModalButton.addEventListener("click", closeModal);

// Écouteur d'événement pour le bouton de modification dans la modal
editProfileButton.addEventListener("click", () => {
  closeModal();
  profileForm.submit();
});

// Écouteur d'événement pour le bouton de suppression dans la modal
deleteProfileButton.addEventListener("click", () => {
  closeModal();
  deleteEmployee(currentEmployeeIndex);
});

// Écouteur d'événement pour fermer la modal en cliquant à l'extérieur
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    closeModal();
  }
});
