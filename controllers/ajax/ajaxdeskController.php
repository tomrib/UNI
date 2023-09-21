<?php
// Inclusion du fichier contenant la définition de la classe 'notesModel'
require_once '../../models/notesModel.php';

// Création d'une nouvelle instance de la classe 'note'
$deleteNote = new note;

// Vérification si la variable GET 'deleteid' est définie et si des notes existent avec cet 'id'
if (isset($_GET['deleteid']) && $deleteNote->checkIfNotesExist('id') != 0) {
    // Récupération de 'deleteid' depuis la variable GET et l'assigne à la propriété 'id' de l'objet $deleteNote
    $deleteNote->id = $_GET['deleteid'];

    // Appel de la méthode 'deleteNote' de l'objet $deleteNote pour supprimer une note
    if ($deleteNote->deleteNote()) {
        // Si la suppression est réussie, définir le statut 'status' à true et récupérer la liste des notes mises à jour
        $results['status'] = true;
        $results['data'] = $deleteNote->listsNote();
    } else {
        // Si la suppression échoue, définir le statut 'status' à false
        $results['status'] = false;
    }

    // Encodage des résultats en format JSON et les affiche
    echo json_encode($results);
}
