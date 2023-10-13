// CONST Modal arrivée:
const arrivalButton = document.getElementById("arrivalButton");
const endButton = document.getElementById("endButton");
const arrivalMessage = document.getElementById("arrivalMessage");
const modal = document.getElementById("myModalArrival");
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


for (let t of timeButtons) {
  t.addEventListener('click', () => {
    arrivalMessage.innerHTML = '';
    let action = t.getAttribute('action');
    let id_date = document.getElementById('id_date').value;
    let id_customers = document.getElementById('id_customers').value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        let data = JSON.parse(this.responseText);
        if (data.success != undefined) {
          arrivalMessage.innerHTML = data.success;
        } else {
          arrivalMessage.innerHTML = data.id_customers;
        }
        modal.style.display = "block";
      }
    }
    xhr.open("GET", "controllers/ajax/ajaxStaffTimeController.php?action=" + action + "&id_date=" + id_date + "&id_customers=" + id_customers, true);
    xhr.send();
  })
}

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

for (let btn of closeButton) {
  // JS Bouton "Oui" dans la modal de confirmation
  btn.addEventListener("click", function () {
    // Ajoutez ici le code pour soumettre le modalUpload ou effectuer d'autres actions nécessaires.

    // Fermez la modal de confirmation
    confirmationModal.style.display = "none";
  });
}
uploadButtonTest.addEventListener("click", function (event) {
  event.preventDefault();
  fileInput.click();
});

// Créez un tableau vide appelé "fileList" pour stocker les fichiers sélectionnés
let fileList = [];

// Écoutez l'événement de sélection de fichiers
fileInput.addEventListener('change', (event) => {
  const selectedFiles = fileInput.files;
  const fileCount = selectedFiles.length;
  // Accédez à la liste des fichiers sélectionnés
  const files = event.target.files;
  // Parcourez la liste des fichiers et ajoutez-les au tableau global "fileList"
  for (let i = 0; i < files.length; i++) {
    fileList.push(files[i]);
    if (fileCount > 0) {
      modalUpload.style.display = "block";
      fileCountText.textContent = ` ${fileList.length} fichier(s) sélectionné(s)`;
    } else {
      modalUpload.style.display = "none";
    }
  }
  // Affichez les fichiers sélectionnés dans la console
  console.log('Fichiers sélectionnés :', fileList);
});

// Ajoutez un écouteur d'événements au bouton (doit être défini dans le code HTML avec l'ID "uploadButton")
sendButton.addEventListener('click', (event) => {
  // Créez un objet FormData pour stocker les fichiers à envoyer
  const formData = new FormData(modalUpload);

  // Ajoutez chaque fichier au FormData
  fileList.forEach((file, index) => {
    formData.append(`file${index + 1}`, file);
    console.log('Fichier ajouté au FormData :', file);
  });

  // Spécifiez l'URL vers laquelle envoyer les fichiers 
  const url = './controllerIntervention';

  // Effectuez une requête POST avec fetch vers le serveur à l'URL spécifiée
  fetch(url, {
    method: 'POST',
    body: formData,
  }).then(response => response.text())
    // Après avoir traité la réponse du serveur
    .then(data => {
      // Effacez le contenu précédent des erreurs
      const errorMessagesElement = document.getElementById('errorMessages');
      errorMessagesElement.innerHTML = '';

      // Vérifiez si data est un tableau avant d'itérer dessus
      if (Array.isArray(data)) {
        data.forEach(error => {
          const errorElement = document.createElement('div');
          errorElement.textContent = error;
          errorMessagesElement.appendChild(errorElement);
        });
      } else {
        // Si data n'est pas un tableau, affichez-le tel quel
        const errorElement = document.createElement('div');
        errorElement.textContent = data;
        errorMessagesElement.appendChild(errorElement);
      }
    })

    .catch(error => {
      // Gérez les erreurs éventuelles lors de l'envoi des fichiers
      console.error('Erreur lors de l\'envoi des fichiers :', error);

    });
  })
    

sendButton.addEventListener('click', function (event) {
  // Empêche la soumission normale du formulaire

  // Récupérez les valeurs des champs de texte et des sélecteurs
  const textIntervention = document.getElementById('text').value;
  const idCustomer = document.getElementById('id_customer').value;
  const timeIntervention = document.getElementById('time').value;
  const idTypesInterventions = document.getElementById('id_typesInterventions').value;

  // Affichez les valeurs récupérées dans la console
  console.log('Texte d\'intervention :', textIntervention);
  console.log('ID du client :', idCustomer);
  console.log('Heure d\'intervention :', timeIntervention);
  console.log('ID du type d\'intervention :', idTypesInterventions);

  // Vous pouvez également envoyer ces valeurs au serveur avec Fetch si nécessaire
});
