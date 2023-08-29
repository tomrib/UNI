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

// Récupérer les éléments nécessaires
const textPassWord = document.getElementById("textPassWord");
const passwordInput = document.getElementById("password");
const lower = document.getElementById("lower");
const upper = document.getElementById("upper");
const number = document.getElementById("number");
const special = document.getElementById("special");
const stringLength = document.getElementById("stringLength");

// Fonction pour mettre à jour la couleur du contour du mot de passe
function updatePasswordBorder(valid) {
  if (valid) {
    textPassWord.style.borderColor = "green";
  } else {
    textPassWord.style.borderColor = "red";
  }
}

// Fonction pour vérifier les conditions du mot de passe
function checkPasswordConditions() {
  const passwordValue = passwordInput.value;

  const hasLower = /[a-z]/.test(passwordValue);
  const hasUpper = /[A-Z]/.test(passwordValue);
  const hasNumber = /\d/.test(passwordValue);
  const hasSpecial = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]+/.test(passwordValue);
  const hasLength = passwordValue.length >= 8;

  lower.style.color = hasLower ? "green" : "";
  upper.style.color = hasUpper ? "green" : "";
  number.style.color = hasNumber ? "green" : "";
  special.style.color = hasSpecial ? "green" : "";
  stringLength.style.color = hasLength ? "green" : "";

  const allConditionsMet =
    hasLower && hasUpper && hasNumber && hasSpecial && hasLength;
  updatePasswordBorder(allConditionsMet);
}

// Ajouter un écouteur d'événement sur la saisie du mot de passe
passwordInput.addEventListener("input", checkPasswordConditions);
