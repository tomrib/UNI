// Sélection des éléments HTML par leur classe ou ID et assignation à des variables
var infoEmployee = document.querySelectorAll(".infoEmployee");
var displayModal = document.getElementById("displayModal");
var deleteEmployee = document.querySelectorAll(".deleteEmployee");
var confirmDeleteModal = document.getElementById("confirmDeleteModal"); 
var listEmployee = document.querySelector('.liveList');

var closeModalButton = document.getElementById("closeModalButton");
var cancelDeleteModalButton = document.getElementById("cancelDeleteModalButton");

// Ajout d'événement "click" à closeModalButton
closeModalButton.addEventListener('click', () => {
  displayModal.style.display = "none";
   // Masque la modal displayModal
})

// Ajout d'événement "click" à cancelDeleteModalButton
cancelDeleteModalButton.addEventListener('click', () => {
  confirmDeleteModal.style.display = "none"; 
  // Masque la modal confirmDeleteModal
})

// Fonction qui génère un modèle HTML pour afficher des informations
function pattern(label, value) {
  let pattern = '<div class="infoItem">'
    + '<p class="strongP">' + label + '</p>'
    + '<p>' + value + '</p>'
    + '</div>'
  return pattern;
}

// Fonction pour afficher les informations d'un employé dans la modal
function displayEmployee(e) {
  displayModal.style.display = "block"; 
  // Affiche la modal displayModal
  var idEmployee = e.getAttribute('data-id'); 
  // Obtient l'ID de l'employé depuis l'élément cliqué

  var xhr = new XMLHttpRequest();
   // Crée un objet XMLHttpRequest pour effectuer une requête AJAX
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) { 
      // Vérifie que la requête est terminée avec succès
      let data = JSON.parse(this.responseText); 
      // Parse la réponse JSON

      // Remplit le contenu de la modal avec les informations de l'employé
      modalContent.innerHTML = '';
      modalContent.innerHTML += pattern('Nom', data.lastname)
      modalContent.innerHTML += pattern('Prénom', data.firstname)
      modalContent.innerHTML += pattern('Mail', data.email)
      modalContent.innerHTML += pattern('Date de naissance', data.birthday)
      modalContent.innerHTML += pattern('Adresse', data.address)
      modalContent.innerHTML += pattern('Téléphone', data.phone)
      modalContent.innerHTML += pattern('Type de contrat', data.contra)
      modalContent.innerHTML += pattern('Date de début', data.beginningContract)
      modalContent.innerHTML += pattern('Date de fin', data.endContract)
      modalContent.innerHTML += pattern('Numéro de sécurité sociale', data.socialInsuranceNumber)
    }
  }
  // Effectue une requête GET AJAX pour récupérer les informations de l'employé
  xhr.open("GET", "controllers/ajax/ajaxListEmployeeController.php?displayid=" + idEmployee, true);
  xhr.send();
}

// Fonction pour marquer un employé pour suppression
function deleteEmployeeById(d) {
  var idEmployee = d.getAttribute('data-id');
   // Obtient l'ID de l'employé depuis l'élément cliqué
  confirmDeleteModal.style.display = "block";
   // Affiche la modal de confirmation de suppression
  confirmDelete.setAttribute('data-id', idEmployee); 
  // Stocke l'ID de l'employé dans l'élément de confirmation
}

// Fonction qui génère un modèle HTML pour afficher les détails d'un employé dans une liste
function listEmployeePattern(d) {
  let pattern = '<tr>'
    + '<td class="fixedWidthColumn">' + d.lastname + '</td>'
    + '<td class="fixedWidthColumn">' + d.firstname + '</td>'
    + '<td class="fixedWidthColumn">' + d.email + '</td>'
    + '<td class="fixedWidthColumn">' + d.phone + '</td>'
    + '<td class="border" id="modalInfo">'
    + '<button type="button" name="info" class="infoEmployee" id="infoEmployee" title="fiche d\'information" data-id="' + d.id + '" onclick="displayEmployee(this)"><i class="fas fa-eye"></i></button>'
    + '</td>'
    + '<td class="border">'
    + '<a class="editEmployeeButton" href="./Modifier-Employer-' + d.id + '"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>'
    + '</td>'
    + '<td class="border">'
    + '<button type="button" id="hoverDanger" class="deleteEmployee" title="suppression de la fiche" data-id="' + d.id + '" onclick="deleteEmployeeById(this)"><i class="fas fa-trash-alt"></i></button>'
    + '</td>'
    + '</tr>'
  return pattern;
}

// Ajout d'un événement "click" à l'élément avec l'ID "confirmDelete"
confirmDelete.addEventListener('click', () => {
  var idEmployee = confirmDelete.getAttribute('data-id');
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
        confirmDeleteModal.style.display = "none"; 
        // Masque la modal de confirmation de suppression
        listEmployee.innerHTML = ''; 
        // Efface le contenu de la liste d'employés

        // Remplit à nouveau la liste d'employés avec les données mises à jour
        for (let d of data.data) {
          listEmployee.innerHTML += listEmployeePattern(d);
        }
      }
    }
  }
  // Effectue une requête GET AJAX pour supprimer l'employé
  xhr.open("GET", "controllers/ajax/ajaxListEmployeeController.php?deleteid=" + idEmployee, true);
  xhr.send();
})
