document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour afficher la modal de confirmation de modification
  function showConfirmationModal() {
    confirmationUpdateIntervention.style.display = "block";
  }

  // Fonction pour ouvrir la modal "infoIntervention"
  function openInfoInterventionModal() {
    infoInterventionModal.style.display = "block";
  }

  // Sélection des éléments HTML par leur classe ou ID et assignation à des variables
  var infoIntervention = document.querySelectorAll(".infoIntervention");
  var displayModal = document.getElementById("displayModal");
  var confirmDeleteIntervention = document.getElementById(
    "confirmDeleteIntervention"
  );
  var interventionsList = document.querySelector(".interventionsList");
  var confirmDeleteButton = document.getElementById("confirmDeleteButton");

  var closeModalButton = document.getElementById("closeModalButton");
  var cancelDeleteModalButton = document.getElementById(
    "cancelDeleteModalButton"
  );
  var viewInterventionButton = document.getElementById("viewIntervention"); // Bouton pour ouvrir la modal infoIntervention

  // Ajout d'événement "click" à closeModalButton
  if (closeModalButton) {
    closeModalButton.addEventListener("click", () => {
      displayModal.style.display = "none";
      // Masque la modal displayModal
    });
  }

  // Ajout d'événement "click" à cancelDeleteModalButton
  if (cancelDeleteModalButton) {
    cancelDeleteModalButton.addEventListener("click", () => {
      confirmDeleteIntervention.style.display = "none";
      // Masque la modal confirmDeleteIntervention
    });
  }

  // Ajoutez un gestionnaire d'événements au bouton de confirmation
  if (confirmDeleteButton) {
    confirmDeleteButton.addEventListener("click", function () {
      confirmDeleteIntervention.style.display = "none";
      // Masque la modal displayModal
    });
  }

  // Ajout d'événement "click" à viewInterventionButton (ouverture de la modal infoIntervention)
  if (viewInterventionButton) {
    viewInterventionButton.addEventListener("click", () => {
      openInfoInterventionModal(); // Ouvre la modal infoIntervention
    });
  }

  // Vérifiez si vous êtes sur la page de la liste des interventions
  if (interventionsList) {
    // Page de liste des interventions
    // Sélectionnez les éléments spécifiques de cette page
    var deleteIntervention = document.querySelectorAll(".deleteIntervention");

    // Boucle sur les boutons de suppression pour leur ajouter un gestionnaire d'événements
    deleteIntervention.forEach(function (button) {
      button.addEventListener("click", function () {
        // Afficher la modal de confirmation de suppression lorsque le bouton est cliqué
        confirmDeleteIntervention.style.display = "block";

        // Vous pouvez ajouter ici le code pour gérer la suppression de l'intervention lorsque l'utilisateur confirme.
      });
    });
  } else {
    // Page de modification d'intervention
    // Sélectionnez les éléments spécifiques de cette page
    var profileForm = document.getElementById("profileForm");
    var confirmationUpdateIntervention = document.getElementById(
      "confirmationUpdateIntervention"
    );
    var validationUpdateIntervention =
      document.getElementById("validationUpdate");
    var cancelUpdateIntervention = document.getElementById(
      "cancelUpdateIntervention"
    );

    // Vérifiez si l'élément "validationUpdate" existe avant d'ajouter un gestionnaire d'événements
    if (validationUpdateIntervention) {
      // Ajoutez un gestionnaire d'événements au bouton "Modifier" pour afficher la modal de confirmation
      validationUpdateIntervention.addEventListener("click", function (event) {
        event.preventDefault(); // Empêchez le formulaire de se soumettre normalement
        showConfirmationModal(); // Appelez la fonction pour afficher la modal de confirmation
      });
    }

    // Assurez-vous également d'avoir un bouton "Annuler" dans votre modal de confirmation pour la masquer si nécessaire
    if (cancelUpdateIntervention) {
      cancelUpdateIntervention.addEventListener("click", function () {
        confirmationUpdateIntervention.style.display = "none"; // Masquez la modal de confirmation
      });
    }
  }

  // Fonction pour afficher la modal "addIntervenant"
  function openAddIntervenantModal() {
    var addIntervenantModal = document.getElementById("addIntervenant");
    if (addIntervenantModal) {
      addIntervenantModal.style.display = "block";
    }
  }

  // Fonction pour fermer la modal "addIntervenant"
  function closeAddIntervenantModal() {
    var addIntervenantModal = document.getElementById("addIntervenant");
    if (addIntervenantModal) {
      addIntervenantModal.style.display = "none";
    }
  }

  // Sélectionnez les boutons "addSubcontractor"
  var addSubcontractorButtons = document.querySelectorAll(".addSubcontractor");

  // Ajoutez un gestionnaire d'événements à chaque bouton "addSubcontractor"
  addSubcontractorButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Affichez la modal "addIntervenant" lorsque le bouton "addSubcontractor" est cliqué
      openAddIntervenantModal();
    });
  });

  // Sélectionnez le bouton "Annuler" de la modal "addIntervenant"
  var cancelAddIntervenantButton = document.getElementById(
    "cancelDeleteModalButton"
  );

  // Ajoutez un gestionnaire d'événements au bouton "Annuler" de la modal "addIntervenant"
  if (cancelAddIntervenantButton) {
    cancelAddIntervenantButton.addEventListener("click", function () {
      // Fermez la modal "addIntervenant" lorsque le bouton "Annuler" est cliqué
      closeAddIntervenantModal();
    });
  }

  // Sélectionnez le bouton "Valider" dans la modal "addIntervenant"
  var confirmAddIntervenantButton = document.getElementById(
    "confirmAddIntervenant"
  );

  // Sélectionnez le bouton "Annuler" dans la modal "addIntervenant"
  var cancelAddIntervenantButton = document.getElementById(
    "cancelAddIntervenant"
  );

  // Ajoutez un gestionnaire d'événements au bouton "Valider"
  confirmAddIntervenantButton.addEventListener("click", function () {
    // Ajoutez ici le code pour traiter la validation des données de la modal "addIntervenant"
    // Par exemple, enregistrez les données ou effectuez des opérations nécessaires
    // Ensuite, fermez la modal
    closeAddIntervenantModal();
  });

  // Sélectionnez le bouton "Fermer" par son id
  const closeInfoInterventionButton = document.getElementById(
    "closeInfoInterventionButton"
  );

  // Sélectionnez la modal "infoIntervention" par son id
  const infoInterventionModal = document.getElementById("infoIntervention");

  // Ajoutez un événement de clic au bouton "Fermer"
  closeInfoInterventionButton.addEventListener("click", () => {
    // Fermez la modal en modifiant le style pour la rendre invisible
    infoInterventionModal.style.display = "none";
  });

  // Fonction pour ouvrir la modal de carrousel des pièces jointes
  function openPhotoCarouselModal() {
    var photoCarouselModal = document.getElementById("photoCarouselModal");
    if (photoCarouselModal) {
      photoCarouselModal.style.display = "block";
    }
  }

  // Fonction pour fermer la modal de carrousel des pièces jointes
  function closePhotoCarouselModal() {
    var photoCarouselModal = document.getElementById("photoCarouselModal");
    if (photoCarouselModal) {
      photoCarouselModal.style.display = "none";
    }
  }

  // Sélectionnez le bouton "Voir les pièces jointes"
  var viewPhotoButton = document.getElementById("viewPhotoButton");

  // Ajoutez un gestionnaire d'événements au bouton "Voir les pièces jointes"
  if (viewPhotoButton) {
    viewPhotoButton.addEventListener("click", function () {
      // Ouvrez la modal de carrousel des pièces jointes lorsque le bouton est cliqué
      openPhotoCarouselModal();
    });
  }

  // Sélectionnez le bouton de fermeture de la modal de carrousel
  var closeCarouselButton = document.querySelector(".close");

  // Ajoutez un gestionnaire d'événements au bouton de fermeture de la modal de carrousel
  if (closeCarouselButton) {
    closeCarouselButton.addEventListener("click", function () {
      // Fermez la modal de carrousel des pièces jointes lorsque le bouton est cliqué
      closePhotoCarouselModal();
    });
  }

  // Sélectionnez le carrousel d'images
  var imageCarousel = document.getElementById("imageCarousel");

  // Fonction pour afficher une image du carrousel
  function showImage(index) {
    var slides = imageCarousel.querySelectorAll(".carousel-slide");
    slides.forEach(function (slide) {
      slide.style.display = "none";
    });
    slides[index].style.display = "block";
  }

  // Initialisez le carrousel en affichant la première image
  showImage(0);

  // Ajoutez un gestionnaire d'événements pour naviguer dans le carrousel
  var currentIndex = 0;
  var totalImages = imageCarousel.querySelectorAll(".carousel-slide").length;

  imageCarousel.addEventListener("click", function () {
    currentIndex = (currentIndex + 1) % totalImages;
    showImage(currentIndex);
  });
});

// Fonction qui génère un modèle HTML pour afficher des informations
function pattern(label, value) {
  let pattern =
    '<div class="infoItem">' +
    '<p class="strongP">' +
    label +
    "</p>" +
    "<p>" +
    value +
    "</p>" +
    "</div>";
  return pattern;
}

// Fonction pour afficher les informations d'un employé dans la modal
function displayEmployee(e) {
  displayModal.style.display = "block";
  // Affiche la modal displayModal
  var idEmployee = e.getAttribute("data-id");
  // Obtient l'ID de l'employé depuis l'élément cliqué

  var xhr = new XMLHttpRequest();
  // Crée un objet XMLHttpRequest pour effectuer une requête AJAX
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Vérifie que la requête est terminée avec succès
      let data = JSON.parse(this.responseText);
      // Parse la réponse JSON

      // Remplit le contenu de la modal avec les informations de l'employé
      modalContent.innerHTML = "";
      modalContent.innerHTML += pattern("Date de création: ", data.interventionDate);
      modalContent.innerHTML += pattern("Créer par: ", data.userName);
      modalContent.innerHTML += pattern("Type d'intervention: ", data.typesIntervention);
      modalContent.innerHTML += pattern("Date de l'intervention: ", data.reportingDate);
      modalContent.innerHTML += pattern("Adresse de l'intervention:", data.address);
      modalContent.innerHTML += pattern("Intervenant:", data.nameSudcontractor);
      modalContent.innerHTML += pattern("Commentaire:", data.text);
    }
  };
  // Effectue une requête GET AJAX pour récupérer les informations de l'employé
  xhr.open(
    "GET",
    "controllers/ajax/ajaxListInterventionController.php?displayid=" + idEmployee,
    true
  );
  xhr.send();
}

// Fonction pour marquer un employé pour suppression
function deleteEmployeeById(d) {
  var idInetrvention = d.getAttribute("data-id");
  // Obtient l'ID de l'employé depuis l'élément cliqué
  confirmDeleteModal.style.display = "block";
  // Affiche la modal de confirmation de suppression
  confirmDelete.setAttribute("data-id", idInetrvention);
  // Stocke l'ID de l'employé dans l'élément de confirmation
}

// Fonction qui génère un modèle HTML pour afficher les détails d'un employé dans une liste
function listInterventionPattern(d) {
  let pattern =
    '<tr>' +
    '<td>' + d.reportingDate + '</td>' +
    '<td>' + d.name + '</td>' +
    '<td>' + d.address + '</td>' +
    '<td>' + d.text + '</td>' +
    '<td class="border">' +
    '<button type="button" name="addSubcontractor" class="addSubcontractor" id="addSubcontractor" title="rajouter un sous-traitant" data-id="' + d.id + '"><i class="fas fa-add"></i></button>' +
    '</td>' +
    '<td class="border">' +
    '<button type="button" name="viewIntervention" class="viewIntervention" id="viewIntervention" title="voir l\'intervention" data-id="' + d.id + '"><i class="fas fa-eye"></i></button>' +
    '</td>' +
    '<td class="border">' +
    '<a href="./Modifier-Intervention"><button type="button" name="updateIntervention" class="updateIntervention" id="updateIntervention" title="modifier l\'intervention" data-id="' + d.id + '"><i class="fas fa-edit"></i></a></button>' +
    '</td>' +
    '<td class="border">' +
    '<button type="button" name="deleteIntervention" class="deleteIntervention" id="hoverDanger" title="supprimer l\'intervention" data-id="' + d.id + '"><i class="fas fa-trash-alt"></i></button>' +
    '</td>' +
    '</tr>'
  return pattern;
}

// Ajout d'un événement "click" à l'élément avec l'ID "confirmDelete"
confirmDelete.addEventListener("click", () => {
  var idInetrvention = confirmDelete.getAttribute("data-id");

  // Obtient l'ID de l'employé à supprimer
  var xhr = new XMLHttpRequest();
  // Crée un objet XMLHttpRequest pour effectuer une requête AJAX
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Vérifie que la requête est terminée avec succès
      let data = JSON.parse(this.responseText);
      // Parse la réponse JSON

      if (data.status == true) {
        // Si la suppression réussit
        confirmDeleteIntervention.style.display = "none";
        // Masque la modal de confirmation de suppression
        listEmployee.innerHTML = "";
        // Efface le contenu de la liste d'employés

        // Remplit à nouveau la liste d'employés avec les données mises à jour
        for (let d of data.data) {
          listEmployee.innerHTML += listInterventionPattern(d);
        }
      }
    }
  };
  // Effectue une requête GET AJAX pour supprimer l'employé
  xhr.open(
    "GET",
    "controllers/ajax/ajaxListInterventionController.php?deleteid=" + idInetrvention,
    true
  );
  xhr.send();
});
