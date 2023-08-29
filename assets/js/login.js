function valider() {
  var login = document.getElementById("login").value;
  var password = document.getElementById("password").value;

  // Ajoute ici la logique de validation (par exemple, envoi à un serveur)

  alert(
    "Validation en cours...\nLogin: " + login + "\nMot de passe: " + password
  );
}



function motDePassePerdu() {
  // Ajoute ici la logique pour traiter la récupération du mot de passe perdu
  alert("Mot de passe perdu ?");
}
