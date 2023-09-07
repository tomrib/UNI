const choiceSelect = document.getElementById("contra");
const beginningContract = document.getElementById("beginningContract");
const endContract = document.getElementById("endContract");

choiceSelect.addEventListener("change", function () {
    beginningContract.classList.toggle("onInput");
    if (choiceSelect.value == "2" || choiceSelect.value == "3") {
      beginningContract.classList.toggle("onInput");
      endContract.classList.toggle("onInput");
    }
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

const telephoneInput = document.getElementById("phone");

telephoneInput.addEventListener("input", function () {
  let phoneNumber = telephoneInput.value.replace(/\D/g, ""); //
  phoneNumber = phoneNumber.slice(0, 10);

  if (phoneNumber.length > 2) {
    phoneNumber = phoneNumber.slice(0, 2) + " " + phoneNumber.slice(2);
  }
  if (phoneNumber.length > 5) {
    phoneNumber = phoneNumber.slice(0, 5) + " " + phoneNumber.slice(5);
  }
  if (phoneNumber.length > 8) {
    phoneNumber = phoneNumber.slice(0, 8) + " " + phoneNumber.slice(8);
  }
  if (phoneNumber.length > 11) {
    phoneNumber = phoneNumber.slice(0, 11) + " " + phoneNumber.slice(11);
  }
  if (phoneNumber.length > 14) {
    phoneNumber = phoneNumber.slice(0, 14);
  }

  telephoneInput.value = phoneNumber;
});

const socialInsuranceInput = document.getElementById("socialInsuranceNumber");

socialInsuranceInput.addEventListener("input", function () {
  let socialInsuranceNumber = socialInsuranceInput.value.replace(/\D/g, "");
  socialInsuranceNumber = socialInsuranceNumber.slice(0, 13); // Supprime tous les caractères non numériques

  if (socialInsuranceNumber.length > 1) {
    // Ajoute un espace après le premiers chiffres
    socialInsuranceNumber =
      socialInsuranceNumber.slice(0, 1) + " " + socialInsuranceNumber.slice(1);
  }
  if (socialInsuranceNumber.length > 4) {
    // Ajoute un espace après les 4premiers chiffres
    socialInsuranceNumber =
      socialInsuranceNumber.slice(0, 4) + " " + socialInsuranceNumber.slice(4);
  }
  if (socialInsuranceNumber.length > 7) {
    // Ajoute un espace après les 7 premiers chiffres
    socialInsuranceNumber =
      socialInsuranceNumber.slice(0, 7) + " " + socialInsuranceNumber.slice(7);
  }

  if (socialInsuranceNumber.length > 10) {
    // Limite la longueur totale à 10 caractères
    socialInsuranceNumber =
      socialInsuranceNumber.slice(0, 10) +
      " " +
      socialInsuranceNumber.slice(10);
  }
  if (socialInsuranceNumber.length > 14) {
    // Limite la longueur totale à 14 caractères
    socialInsuranceNumber =
      socialInsuranceNumber.slice(0, 14) +
      " " +
      socialInsuranceNumber.slice(14);
  }
  if (socialInsuranceNumber.length > 19) {
    // Limite la longueur totale à 19 caractères (13 chiffres et 5 espaces)
    socialInsuranceNumber = socialInsuranceNumber.slice(0, 19);
  }
  socialInsuranceInput.value = socialInsuranceNumber;
});
