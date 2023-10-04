function motDePassePerdu() {
  // Ajoute ici la logique pour traiter la récupération du mot de passe perdu
  alert("Mot de passe perdu ?");
}

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
