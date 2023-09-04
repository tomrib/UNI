$(document).ready(function () {
  $("#showPassword").click(function () {
    var passwordInput = $("#password");
    var icon = $(this).find("i");

    if (passwordInput.attr("type") === "password") {
      passwordInput.attr("type", "text");
      icon.removeClass("fa-eye-slash");
      icon.addClass("fa-eye");
    } else {
      passwordInput.attr("type", "password");
      icon.removeClass("fa-eye");
      icon.addClass("fa-eye-slash");
    }
  });
});

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

const passwordInput = document.getElementById("password");
const passwordInfoBox = document.getElementById("password-info-box");
const passwordConditions = [
  { class: "lower", regex: /[a-z]/, message: "Au moins 1 minuscule" },
  { class: "upper", regex: /[A-Z]/, message: "Au moins 1 majuscule" },
  { class: "number", regex: /\d/, message: "Au moins 1 chiffre" },
  {
    class: "special",
    regex: /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]+/,
    message: "Au moins un caractère spécial",
  },
  { class: "stringLength", regex: /^.{8,}$/, message: "Au moins 8 caractères" },
];

function updatePasswordConditions() {
  const passwordValue = passwordInput.value;

  passwordConditions.forEach((condition) => {
    const element = passwordInfoBox.querySelector(`.${condition.class}`);
    const isValid = condition.regex.test(passwordValue);

    element.querySelector("span").textContent = isValid ? "✅" : "❌";
  });
}

function updatePasswordBorder(valid) {
  if (valid) {
    passwordInfoBox.style.borderColor = "green";
  } else {
    passwordInfoBox.style.borderColor = "red";
  }
}

function checkPasswordConditions() {
  const passwordValue = passwordInput.value;

  const allConditionsMet = passwordConditions.every((condition) =>
    condition.regex.test(passwordValue)
  );
  updatePasswordBorder(allConditionsMet);
}

passwordInput.addEventListener("input", () => {
  updatePasswordConditions();
  checkPasswordConditions();
});

passwordInput.addEventListener("focus", () => {
  passwordInfoBox.style.display = "block";
});

passwordInput.addEventListener("blur", () => {
  passwordInfoBox.style.display = "none";
});
