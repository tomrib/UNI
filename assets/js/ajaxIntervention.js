let infoIntervention = document.getElementById('infoIntervention');
let listIntervention = document.getElementById('listIntervention');
let confirmDelete = document.getElementById('confirmDelete');
let confirmDeleteIntervention = document.getElementById('confirmDeleteIntervention');
let cancelDeleteModalButton = document.getElementById('cancelDeleteModalButton');
let closeInfoInterventionButton = document.getElementById('closeInfoInterventionButton');
let infoInterventionModal = document.getElementById('infoInterventionModal');
let viewPhotoButton = document.getElementById('viewPhotoButton');
let closeImgIntervention = document.getElementById('closeImgIntervention');
let photoCarouselModal = document.getElementById('photoCarouselModal');

// Ajout d'événement "click" à closeModalButton
closeInfoInterventionButton.addEventListener("click", () => {
    infoIntervention.style.display = "none";
    // Masque la modal displayModal
});
// Gestionnaire d'événements pour le bouton "Annuler" de la boîte de confirmation
cancelDeleteModalButton.addEventListener("click", () => {
    // Fermez simplement la boîte de confirmation en masquant son affichage
    confirmDeleteIntervention.style.display = "none";
});

// Fonction qui génère un modèle HTML pour afficher des informations// Fonction qui génère un modèle HTML pour afficher des informations
function infoInterventionById(e) {
    let pattern =
        '<div id="idInterventionInfo">' +
        '<div class="infoItem">' +
        '<p class="strongP">Date de création: </p><p>' + e.interventionDate + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Nom de l\'entreprise: </p><p>' + e.customerName + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Adresse de l\'entreprise: </p><p>' + e.customerAddress + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Téléphone de l\'entreprise: </p><p>' + e.customerPhone + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Mail de l\'entreprise: </p><p>' + e.customerEmail + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Créé par: </p><p>' + e.userLastname + ' ' + e.userFirstname + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Type d\'intervention: </p><p>' + e.interventionType + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Date de l\'intervention: </p><p>' + e.interventionDate + '</p>' +
        '</div>' +
        '<div class="infoItem">' +
        '<p class="strongP">Commentaire: </p><p>' + e.text + '</p>' +
        '</div>' +
        '</div>' +
        '</div>';
    return pattern;
}
// Fonction pour afficher les informations d'une intervention dans la modal
function displayIntervention(button) {
    let idIntervention = button.getAttribute("data-id");
    // Vérifier si la modal existe
    if (infoIntervention) {
        infoIntervention.style.display = "block";
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let data = JSON.parse(this.responseText);
                if (data) { // Vérifiez si des données ont été renvoyées

                    infoInterventionModal.innerHTML = infoInterventionById(data); // Utilisez les données renvoyées pour générer le contenu
                };
            };
        };
        xhr.open("GET", "controllers/ajax/ajaxListInterventionController.php?displayid=" + idIntervention, true);
        xhr.send();
    };
};
// Fonction pour marquer une intervention pour suppression
function deleteInterventionById(d) {
    var idIntervention = d.getAttribute("data-id");
    // Obtient l'ID de l'intervention depuis l'élément cliqué
    confirmDeleteIntervention.style.display = "block";
    // Affiche la modal de confirmation de suppression
    confirmDelete.setAttribute("data-id", idIntervention);
    // Stocke l'ID de l'intervention dans l'élément de confirmation
}
// Fonction qui génère un modèle HTML pour afficher les détails d'une intervention dans une liste
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
        '<button type="button" name="viewIntervention" class="viewIntervention" id="viewIntervention" title="voir l\'intervention" data-id="' + d.id + '" onclick="displayIntervention(this)"><i class="fas fa-eye"></i></button>' +
        '</td>' +
        '<td class="border">' +
        '<a href="./Modifier-Intervention"><button type="button" name="updateIntervention" class="updateIntervention" id="updateIntervention" title="modifier l\'intervention" data-id="' + d.id + '"><i class="fas fa-edit"></i></a></button>' +
        '</td>' +
        '<td class="border">' +
        '<button type="button" name="deleteIntervention" class="deleteIntervention" id="hoverDanger" title="supprimer l\'intervention" data-id="' + d.id + '" onclick="deleteInterventionById(this)"><i class="fas fa-trash-alt"></i></button>' +
        '</td>' +
        '</tr>';
    return pattern;
}
// Ajout d'un événement "click" à l'élément avec l'ID "confirmDelete"
confirmDelete.addEventListener("click", () => {
    var idIntervention = confirmDelete.getAttribute("data-id");
    // Obtient l'ID de l'intervention à supprimer
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
                listIntervention.innerHTML = "";
                // Remplit à nouveau la liste d'interventions avec les données mises à jour
                for (let d of data.data) {
                    listIntervention.innerHTML += listInterventionPattern(d);
                };
            };
        };
    };
    // Effectue une requête GET AJAX pour supprimer l'intervention
    xhr.open(
        "GET",
        "controllers/ajax/ajaxListInterventionController.php?deleteid=" + idIntervention,
        true
    );
    xhr.send();
});

closeImgIntervention.addEventListener('click', () => {
    photoCarouselModal.style.display = "none";
});

// Fonction qui génère un modèle HTML pour afficher des images dans un carrousel
