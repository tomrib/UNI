
document.addEventListener("DOMContentLoaded", function () {
    const choixSelect = document.getElementById("contra");
    const dateFields = document.getElementById("dateFields");

    choixSelect.addEventListener("change", function () {
        if (choixSelect.value == "2" || choixSelect.value == "3") {
            dateFields.innerHTML = `
          <label for="dateDebut">Date de début :</label>
          <input type="date" id="dateDebut" name="dateDebut" required>
          <label for="dateFin">Date de fin :</label>
          <input type="date" id="dateFin" name="dateFin" required>
          `;
        } else {
            dateFields.innerHTML = ""; // Réinitialise le contenu si l'option n'est pas CDD ou Extra
        }
    });

    const form = document.getElementById("profileForm"); // Utilisez le bon ID du formulaire ici
    form.appendChild(dateFields);
});