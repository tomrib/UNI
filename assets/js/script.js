const nav = document.querySelector("nav");
const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.querySelectorAll("nav ul li");

document.addEventListener("DOMContentLoaded", function () {
  const calendarBody = document.querySelector(".days");
  const currentMonthLabel = document.querySelector(".current-month");
  const prevMonthBtn = document.querySelector(".prev-month");
  const nextMonthBtn = document.querySelector(".next-month");

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
});

function updateMenuDisplay() {
  if (window.innerWidth <= 768) {
    // En mode responsive, cacher le menu principal
    nav.style.display = menuToggle.checked ? "flex" : "none";
  } else {
    // En mode non responsive, afficher le menu principal
    nav.style.display = "flex";
  }
}

// Mettre à jour l'affichage du menu au chargement de la page
updateMenuDisplay();

menuToggle.addEventListener("change", function () {
  updateMenuDisplay();
});

// Fermer le menu en cliquant en dehors du menu
document.addEventListener("click", function (event) {
  if (!nav.contains(event.target) && !event.target.matches("#menu-toggle")) {
    nav.classList.remove("open");
    menuToggle.checked = false;
  }
});

// Fermer le menu en cliquant sur un lien du menu en version responsive
navLinks.forEach((link) => {
  link.addEventListener("click", function () {
    if (window.innerWidth <= 768) {
      nav.classList.remove("open");
      menuToggle.checked = false;
    }
  });
});

// Fonction pour mettre à jour l'horloge en temps réel
function updateClock() {
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, "0");
  const minutes = String(now.getMinutes()).padStart(2, "0");
  const seconds = String(now.getSeconds()).padStart(2, "0");
  const timeString = `${hours}:${minutes}:${seconds}`;
  document.querySelector(".clock").textContent = timeString;
}

// Mettre à jour l'horloge toutes les secondes
setInterval(updateClock, 1000);

// Appeler updateClock une fois au chargement de la page pour afficher l'heure immédiatement
updateClock();

// Ouverture des modales
const creditsModalTrigger = document.querySelector(".credits-modal-trigger");
const cguModalTrigger = document.querySelector(".cgu-modal-trigger");
const loginModalTrigger = document.querySelector("nav ul li:last-child a");

const creditsModal = document.querySelector(".credits-modal");
const cguModal = document.querySelector(".cgu-modal");
const loginModal = document.querySelector(".login-modal");

creditsModalTrigger.addEventListener("click", function () {
  creditsModal.style.display = "block";
});

cguModalTrigger.addEventListener("click", function () {
  cguModal.style.display = "block";
});

loginModalTrigger.addEventListener("click", function () {
  loginModal.style.display = "block";
});

// Fermeture des modales
const closeModalButtons = document.querySelectorAll(".close");

closeModalButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const modal = this.closest(".modal");
    modal.style.display = "none";
  });
});

// Supposons que vous ayez un tableau d'actualités provenant de la base de données
const newsData = [
  {
    title: "Titre de l'actualité 1",
    content: "Contenu de l'actualité 1...",
  },
  {
    title: "Titre de l'actualité 2",
    content: "Contenu de l'actualité 2...",
  },
  // ... autres actualités
];

// Appeler la fonction pour générer les actualités au chargement de la page
document.addEventListener("DOMContentLoaded", generateNews);
