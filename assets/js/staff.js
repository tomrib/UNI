// Ouverture du dom:
var formulaire = document.getElementById("workTime");
var formErrors = document.getElementById("formErrors");
// CONST Modal arrivée:
const arrivalButton = document.getElementById("arrivalButton");
const endButton = document.getElementById("endButton");
const arrivalMessage = document.getElementById("arrivalMessage");
const modal = document.getElementById("myModalArrival");

// CONST Modal Départ:
const modalDepart = document.getElementById("myModalDepart");
const endMessage = document.getElementById("endMessage");
const endCloseButton = document.getElementById("endCloseButton");

// CONST modal Signalement:
const openUploadButton = document.getElementById("openUploadModal");
const modalUpload = document.getElementById("myModalUpload");
const cancelButton = document.getElementById("UploadCloseButton");
const sendButton = document.getElementById("sendButton");

// CONST confirmation modal:
const confirmationModal = document.getElementById("confirmationModal");

// CONST bouton input:
const uploadButtonTest = document.getElementById("uploadButtonTest");
const fileInput = document.getElementById("fileUpload");
const fileCountText = document.getElementById("fileCountText");

const closeButton = document.querySelectorAll(".closeButton");
const timeButtons = document.querySelectorAll(".timeButtons");

/*-----DÉCLARATION DES ÉVÉNEMENTS-----*/
arrivalButton.addEventListener("click", function (event) {
  event.preventDefault(); // Empêche le comportement par défaut du bouton
});

endButton.addEventListener("click", function (event) {
  event.preventDefault(); // Empêche le comportement par défaut du bouton
});


// function submitForm() {
//   var xhr = new XMLHttpRequest();
//   var formData = new FormData(formulaire);
//   console.log(formulaire);
//   xhr.open("POST", "controllers/ajax/ajaxStaffTimeController.php?action=end", true); // Ouvrir la requête d'abord
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
      
//       // Traitement de la réponse du serveur
//       var response = JSON.parse(this.responseText);
//       if (response.message) {
//         alert(response.message);
//         // Réinitialisez le formulaire ou effectuez d'autres actions ici
//       } else if (response.error) {
//         formErrors.innerHTML = response.error;
//       }
      
//     }
//   };
//   xhr.send(); // Ensuite, envoyer les données
// }

for(let t of timeButtons) {
  t.addEventListener('click', () => {
    arrivalMessage.innerHTML = '';
    let action = t.getAttribute('action');
    let id_date = document.getElementById('id_date').value;
    let id_customers = document.getElementById('id_customers').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        let data = JSON.parse(this.responseText);

        if(data.success != undefined) {
          arrivalMessage.innerHTML = data.success;
        } else {
          arrivalMessage.innerHTML = data.id_customers;

        }
      
          modal.style.display = "block";
    
      }
    }
    
  xhr.open("GET", "controllers/ajax/ajaxStaffTimeController.php?action=" + action + "&id_date=" + id_date + "&id_customers=" + id_customers , true);
  xhr.send();
  })

}

// JS Fermeture modal arrivée:
arrivalCloseButton.addEventListener("click", () => {
  modal.style.display = "none";
  location.reload();
});







// JS Bouton click pour upload le/les fichier(s):
uploadButtonTest.addEventListener("click", function (event) {
  event.preventDefault();
  fileInput.click();
});

// JS fonction permettant l'indication du nombre de fichier:
fileInput.addEventListener("change", function () {
  const selectedFiles = fileInput.files;
  const fileCount = selectedFiles.length;
  if (fileCount > 0) {
    modalUpload.style.display = "block";
    fileCountText.textContent = `${fileCount} fichier(s) sélectionné(s)`;
  } else {
    modalUpload.style.display = "none";
  }
});

// JS Bouton ouverture signalement:
openUploadButton.addEventListener("click", () => {
  // Réinitialisez le texte du compteur de fichiers lorsque vous ouvrez la modal
  fileCountText.textContent = "Aucun fichier sélectionné";
  modalUpload.style.display = "block";
});

// JS Bouton annuler signalement:
cancelButton.addEventListener("click", () => {
  modalUpload.style.display = "none";
});

// Écouteur de vérification hors modal:
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

// JS Bouton de validation du signalement:
sendButton.addEventListener("click", function (event) {
  event.preventDefault();

  // Afficher la modal de confirmation
  confirmationModal.style.display = "block";
});

for (let btn of closeButton) {
  // JS Bouton "Oui" dans la modal de confirmation
  btn.addEventListener("click", function () {
    // Ajoutez ici le code pour soumettre le formulaire ou effectuer d'autres actions nécessaires.

    // Fermez la modal de confirmation
    confirmationModal.style.display = "none";
  });
}