// Attend que le DOM (Document Object Model) soit chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez tous les éléments avec la classe "deleteNote"
    var confirmDeleteButtons = document.querySelectorAll(".deleteNote");
    var listNote = document.querySelector(".liveList");
    var noNotesMessage = document.getElementById("noNotesMessage"); // Sélectionnez l'élément du message "Aucune actualité pour le moment"

    // Fonction pour supprimer une note en utilisant son ID
    function deleteNoteById(button) {
        // Récupère l'ID de la note à supprimer à partir de l'attribut 'data-id' du bouton
        var idNote = button.getAttribute('data-id');

        // Crée une nouvelle requête XMLHttpRequest pour effectuer une requête AJAX
        var xhr = new XMLHttpRequest();

        // Configure une fonction de rappel pour gérer la réponse de la requête AJAX
        xhr.onreadystatechange = function () {
            // Vérifie si la requête est terminée et la réponse est prête
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Analyse la réponse JSON renvoyée par le serveur
                let data = JSON.parse(this.responseText);

                // Vérifie si la suppression de la note s'est effectuée avec succès
                if (data.status == true) {
                    // Efface le contenu de la liste des notes
                    listNote.innerHTML = '';

                    // Réaffiche toutes les notes mises à jour dans la liste
                    for (let d of data.data) {
                        listNote.innerHTML += listNotePattern(d);
                    }

                    // Réattache les gestionnaires d'événements aux nouveaux boutons de suppression
                    confirmDeleteButtons = document.querySelectorAll(".deleteNote");
                    confirmDeleteButtons.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            deleteNoteById(this);
                        });
                    });
                }
            }
        };

        // Ouvre une requête GET vers le serveur pour supprimer la note avec l'ID spécifié
        xhr.open("GET", "controllers/ajax/ajaxdeskController.php?deleteid=" + idNote, true);
        // Envoie la requête
        xhr.send();
    }

    // Fonction pour générer le modèle de note
    function listNotePattern(d) {
        var pattern = '<div class="newsItem">' +
            '<p>Écrit par : ' + d.firstname + '</p>' +
            '<p>' + d.text + '</p>' +
            '<p>Fait le : ' + d.date + ' à ' + d.timer + '</p>' +
            '<button type="button" class="deleteNote" title="Suppression de la fiche" data-id="' + d.idNote + '"><i class="fas fa-trash-alt"></i></button>' +
            '</div>';
        return pattern;
    }

    // Attacher un gestionnaire d'événements à chaque bouton de suppression
    confirmDeleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            deleteNoteById(this);
        });
    });
});
