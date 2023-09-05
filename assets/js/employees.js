// Fonction pour ouvrir la modal en mode édition
/*
function openEditModal() {
  editProfileButton.style.display = "inline-block";
  deleteProfileButton.style.display = "inline-block";
  openModal();
}

// Fonction pour ouvrir la modal
/*function openModal() {
  modal.classList.add("modal-visible");
}

// Fonction pour fermer la modal
function closeModal() {
  modal.classList.remove("modal-visible");
  profileForm.reset();
}

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
*/
// Écouteur d'événement pour fermer la modal en cliquant à l'extérieur
/*window.addEventListener("click", (event) => {
  if (event.target === modal) {
    closeModal();
  }
});
*/

// Attendez que le DOM soit entièrement chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function () {
  // Récupérez tous les boutons "Info"
  var infoEmployee = document.querySelectorAll(".infoEmployee");

  // Récupérez l'élément modal
  var employeeModal = document.getElementById("employeeModal");

  // Récupérez le bouton de fermeture de la modal
  var closeModalButton = document.getElementById("closeModalButton");

  // Ajoutez un gestionnaire d'événement à chaque bouton "Info"
  infoEmployee.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // Empêchez la redirection par défaut

      // Récupérez l'URL du lien dans le bouton "Info"
      var editLink = this.parentElement.getAttribute("href");

      // Vous pouvez maintenant charger les données de l'employé depuis l'URL
      // et les afficher dans la modal (par exemple, en utilisant une requête AJAX)

      // Affichez la modal
      employeeModal.style.display = "block";
    });
  });

  // Ajoutez un gestionnaire d'événement pour fermer la modal
  closeModalButton.addEventListener("click", function () {
    employeeModal.style.display = "none";
  });
});
