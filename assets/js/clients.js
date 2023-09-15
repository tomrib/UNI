// Sélection des éléments HTML par leur classe ou ID et assignation à des variables
var infoCustomer = document.querySelectorAll(".infoCustomer");
var displayModal = document.getElementById("displayModal");
var deleteCustomer = document.querySelectorAll(".deleteCustomer");
var confirmDeleteModal = document.getElementById("confirmDeleteModal");
var listCustomer = document.querySelector('.liveList');

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

// Fonction pour afficher les informations d'un Customer dans la modal
function displayCustomer(e) {
  displayModal.style.display = "block"; 
  // Affiche la modal displayModal
  var idCustomer = e.getAttribute('data-id'); 
  // Obtient l'ID de Customer depuis l'élément cliqué

  var xhr = new XMLHttpRequest();
   // Crée un objet XMLHttpRequest pour effectuer une requête AJAX
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) { 
      // Vérifie que la requête est terminée avec succès
      let data = JSON.parse(this.responseText); 
      // Parse la réponse JSON

      // Remplit le contenu de la modal avec les informations de Customer
      modalContent.innerHTML = '';
      modalContent.innerHTML += pattern('Entreprise', data.name)
      modalContent.innerHTML += pattern('Nom du contact', data.contactName)
      modalContent.innerHTML += pattern('Adresse', data.address)
      modalContent.innerHTML += pattern('Téléphone', data.phone)
      modalContent.innerHTML += pattern('Email', data.email )
    }
  }
  // Effectue une requête GET AJAX pour récupérer les informations de Customer
  xhr.open("GET", "controllers/ajax/ajaxListCustomerController.php?displayid=" + idCustomer, true);
  xhr.send();
}

// Fonction pour marquer un Customer pour suppression
function deleteCustomerById(d) {
  var idCustomer = d.getAttribute('data-id');
   // Obtient l'ID de Customer depuis l'élément cliqué
  confirmDeleteModal.style.display = "block";
   // Affiche la modal de confirmation de suppression
  confirmDelete.setAttribute('data-id', idCustomer); 
  // Stocke l'ID de Customer dans l'élément de confirmation
}

// Fonction qui génère un modèle HTML pour afficher les détails d'un Customer dans une liste
function listCustomerPattern(d) {
  let pattern = '<tr>'
    + '<td class="fixedWidthColumn">' + d.name + '</td>'
    + '<td class="fixedWidthColumn">' + d.contactName + '</td>'
    + '<td class="fixedWidthColumn">' + d.email + '</td>'
    + '<td class="fixedWidthColumn">' + d.phone + '</td>'
    + '<td class="border" id="modalInfo">'
    + '<button type="button" name="info" class="infoCustomer" id="infoCustomer" title="fiche d\'information" data-id="' + d.id + '" onclick="displayCustomer(this)"><i class="fas fa-eye"></i></button>'
    + '</td>'
    + '<td class="border">'
    + '<a class="editCustomerButton" href="./Modifier-Employer-' + d.id + '"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>'
    + '</td>'
    + '<td class="border">'
    + '<button type="button" id="hoverDanger" class="deleteCustomer" title="suppression de la fiche" data-id="' + d.id + '" onclick="deleteCustomerById(this)"><i class="fas fa-trash-alt"></i></button>'
    + '</td>'
    + '</tr>'
  return pattern;
}
// Ajout d'un événement "click" à l'élément avec l'ID "confirmDelete"
confirmDelete.addEventListener('click', () => {
  var idCustomer = confirmDelete.getAttribute('data-id');
   // Obtient l'ID de Customer à supprimer
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
        listCustomer.innerHTML = ''; 
        // Efface le contenu de la liste d'Customers

        // Remplit à nouveau la liste d'Customers avec les données mises à jour
        for (let d of data.data) {
          listCustomer.innerHTML += listCustomerPattern(d);
        }
      }
    }
  }
  // Effectue une requête GET AJAX pour supprimer Customer
  xhr.open("GET", "controllers/ajax/ajaxListCustomerController.php?deleteid=" + idCustomer, true);
  xhr.send();
})