const nav = document.querySelector("nav");
const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.querySelectorAll("nav ul li");

document.addEventListener("DOMContentLoaded", function () {
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

  // JS - SOUS MENU DE LA NAV
  const parentItems = document.querySelectorAll(".parent");

  parentItems.forEach((parentItem) => {
    parentItem.addEventListener("click", () => {
      parentItems.forEach((item) => {
        if (item !== parentItem) {
          item.classList.remove("active");
        }
      });

      parentItem.classList.toggle("active");
    });
  });
});


