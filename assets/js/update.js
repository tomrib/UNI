// Fonction pour afficher la fenêtre modale de confirmation
function afficherFenetreModale() {
  const modal = document.getElementById("confirmationModal");
  modal.style.display = "block";

  // Ajoutez des écouteurs d'événements aux boutons de la fenêtre modale
  document
    .getElementById("confirmUpdate")
    .addEventListener("click", confirmerMiseAJour);
  document
    .getElementById("cancelUpdate")
    .addEventListener("click", fermerFenetreModale);
}

// Fonction pour gérer le clic sur le bouton "Modifier"
function gererClicBoutonModifier(event) {
  event.preventDefault(); // Empêche la soumission du formulaire (si nécessaire)
  afficherFenetreModale();
}

// Fonction pour gérer le clic sur le bouton "Oui"
function confirmerMiseAJour() {
  // Ajoutez votre code ici pour gérer la mise à jour
  // Par exemple, vous pouvez soumettre le formulaire en JavaScript ou en AJAX
  // Une fois la mise à jour terminée, vous pouvez fermer la fenêtre modale.
  fermerFenetreModale();
}

// Fonction pour fermer la fenêtre modale
function fermerFenetreModale() {
  const modal = document.getElementById("confirmationModal");
  modal.style.display = "none";
}

// Ajoutez un écouteur d'événement au bouton "Modifier"
document
  .getElementById("validationUpdate")
  .addEventListener("click", gererClicBoutonModifier);

//FIN confirmation de modification de profil
