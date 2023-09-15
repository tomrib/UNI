const nav = document.querySelector("nav");
const menuToggle = document.getElementById("menuToggle");
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
    if (!nav.contains(event.target) && !event.target.matches("#menuToggle")) {
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
