function updateDateTime() {
  const dateElement = document.getElementById("date");
  const now = new Date();
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "2-digit",
    minute: "2-digit",
  };

  const formattedDate = now.toLocaleDateString("fr-FR", options);

  dateElement.textContent = formattedDate;
}

// Mettre à jour la date et l'horloge chaque seconde
setInterval(updateDateTime, 1000);

// Appel initial pour afficher la date et l'horloge dès le chargement de la page
updateDateTime();
