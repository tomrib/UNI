document.addEventListener("DOMContentLoaded", function () {
  const choixSelect = document.getElementById("contra");
  const dateFields = document.getElementById("dateFields");

  choixSelect.addEventListener("change", function () {
    if (choixSelect.value == "2" || choixSelect.value == "3") {
      dateFields.innerHTML = `
          <label for="beginningContract">Date de début :</label>
          <input type="date" id="beginningContract" name="beginningContract" required>
          <label for="endContract">Date de fin :</label>
          <input type="date" id="endContract" name="endContract" required>
          <button type="submit" name="validationEmployees" id="validationEmployees">Créer</button>
          `;
    } else if (choixSelect.value == "1" || choixSelect.value == "4" || choixSelect.value == "5") {
      dateFields.innerHTML = `
          <label for="beginningContract">Date de début :</label>
          <input type="date" id="beginningContract" name="beginningContract" required>
          <button type="submit" name="validationEmployees" id="validationEmployees">Créer</button>
          `;
    } else {
      dateFields.innerHTML = ""; // Réinitialise le contenu si l'option n'est pas CDD ou Extra
    }
  });

  const form = document.getElementById("profileForm"); // Utilisez le bon ID du formulaire ici
  form.appendChild(dateFields);
});

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
