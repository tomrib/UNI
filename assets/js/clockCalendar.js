document.addEventListener("DOMContentLoaded", function () {
  const calendarBody = document.querySelector(".days");
  const currentMonthLabel = document.querySelector(".current-month");
  const prevMonthBtn = document.querySelector(".prev-month");
  const nextMonthBtn = document.querySelector(".next-month");

  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.querySelector(".clock").textContent = timeString;
  }
  let currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();

  function updateCalendar() {
    // Effacer les jours précédents
    calendarBody.innerHTML = "";

    // Mettre à jour le label du mois en cours
    currentMonthLabel.textContent = new Intl.DateTimeFormat("fr-FR", {
      year: "numeric",
      month: "long",
    }).format(currentDate);

    // Obtenir le premier jour du mois
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1);

    // Obtenir le dernier jour du mois
    const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

    // Obtenir le jour de la semaine du premier jour du mois (0 pour dimanche, 1 pour lundi, etc.)
    const startDay = firstDayOfMonth.getDay();

    // Obtenir le nombre de jours dans le mois
    const numDays = lastDayOfMonth.getDate();

    // Générer les jours du calendrier
    for (let i = 1 - startDay; i <= numDays; i++) {
      const dayDate = new Date(currentYear, currentMonth, i);
      const dayElement = document.createElement("span");
      dayElement.textContent = i > 0 ? i : "";
      dayElement.classList.add("day");

      // Ajouter une classe pour mettre en évidence le jour en cours
      if (dayDate.toDateString() === currentDate.toDateString()) {
        dayElement.classList.add("current-day");
      }

      calendarBody.appendChild(dayElement);
    }
  }

  // Mettre à jour le calendrier au chargement de la page
  updateCalendar();

  // Gérer le bouton du mois précédent
  prevMonthBtn.addEventListener("click", function () {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    currentDate = new Date(currentYear, currentMonth);
    updateCalendar();
  });

  // Gérer le bouton du mois suivant
  nextMonthBtn.addEventListener("click", function () {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    currentDate = new Date(currentYear, currentMonth);
    updateCalendar();
  });

  // Mettre à jour l'horloge toutes les secondes
  setInterval(updateClock, 1000);

  // Appeler updateClock une fois au chargement de la page pour afficher l'heure immédiatement
  updateClock();
});
