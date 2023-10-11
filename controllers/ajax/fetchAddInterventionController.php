<?php
session_start();
require_once '../../models/imgInterventionModel.php';
require_once '../../models/interventionsModel.php';
require_once '../../confi.php';
$formErrors = [];
// Créer une instance de la classe img
$add = new imginterventions;
$addIntervention = new interventions;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_SESSION['user']['id'])) {
        $addIntervention->id_users = $_SESSION['user']['id'];
    } else {
        header('Location: ./Connexion');
        exit;
    }
    if (!empty($_POST['textIntervention'])) {
        if (!preg_match($regex['content'], $_POST['textIntervention'])) {
            $addIntervention->text = strip_tags($_POST['textIntervention']);
        } else {
            $formErrors[] =  BLOCK_ERROR_TEXT;
        }
    } else {
        $formErrors[] =  INTERVENTION_ERREUR_EMPTY;
    }
    $date = date('Y-m-d');
    if (!empty($date)) {
        $addIntervention->reportingDate = $date;
    } else {
        $formErrors[] =  ERREUR_ADMIN_INVALID;
    }
    if (!empty($_POST['timeIntervention'])) {
        if (preg_match($regex['time'], $_POST['timeIntervention'])) {
            $addIntervention->reportingTime = strip_tags($_POST['timeIntervention']);
        } else {
            $formErrors[] =  INTERVENTION_ERREUR_TIME_INVALID;
        }
    } else {
        $formErrors[] =  INTERVENTION_ERREUR_TIME_EMPTY;
    }
    if (!empty($_POST['id_customer'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_customer'])) {
            $addIntervention->id_customers = intval(strip_tags($_POST['id_customer']));
        } else {
            $formErrors[] =  USER_CUSTOMER_ERROR_INVALID;
        }
    } else {
        $formErrors[] =  USER_CUSTOMER_ERROR_EMPTY;
    }
    if (!empty($_POST['id_typesInterventions'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_typesInterventions'])) {
            $addIntervention->id_typesInterventions = intval(strip_tags($_POST['id_typesInterventions']));
        } else {
            $formErrors[] =  USER_ERREUR_TYPEINTERVENTIO_INVALID;
        }
    } else {
        $formErrors[] =  USER_ERREUR_TYPEINTERVENTIO_EMPTY;
    }

    // Parcourir les fichiers téléchargés (en supposant qu'il puisse y en avoir plusieurs)
    foreach ($_FILES as $file) {
        if (!empty($file)) {
            // Vérifier le code d'erreur pour déterminer le résultat du téléchargement
            switch ($file['error']) {
                case UPLOAD_ERR_OK:  // tout et ok 0
                    // Obtenir l'extension du fichier
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    // Vérifier si l'extension est autorisée
                    if (array_key_exists($extension, $mime_types) && mime_content_type($file['tmp_name']) == $mime_types[$extension]) {
                        // Définir le chemin de destination du fichier téléchargé
                        $path = 'assets/img/imgInter/' . uniqid() . '.' . $extension;
                        // Déplacer le fichier téléchargé vers le chemin de destination
                        if (move_uploaded_file($file['tmp_name'], '../../' . $path)) {
                            chmod('../../' . $path, '664');  // Correction des permissions
                            // Ajouter les informations sur le fichier à la base de données
                            $paths[] =  $path;
                        } else {
                            $formErrors[] =  'Erreur lors du déplacement du fichier téléchargé. \n';
                        }
                    } else {
                        $formErrors[] =  ' Extension de fichier non autorisée ou type MIME incorrect. ';
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE: //erreur 1
                    $formErrors[] =  ' taille ';
                case UPLOAD_ERR_PARTIAL: //erreur 3
                    $formErrors[] =  ' Le fichier n\'a été que partiellement téléchargé. \n';
                    break;
                case UPLOAD_ERR_NO_FILE: //erreur 4
                    $formErrors[] =  ' Aucun fichier n\'a été téléchargé. \n';
                    break;
                default:
                    $formErrors[] =  ' Une erreur inconnue s\'est produite. \n';
            }
        }
    }
    if (count($formErrors)  == 0) {

        try {
            $idInter = $addIntervention->addIntervention();
            $add->id_interventions = $idInter;





            foreach ($paths as $p) {
                $add->img = $p;
                if ($add->addImgIntervention()) {
                    $formErrors[] =  'Fichier téléchargé avec succès \n';
                } else {
                    unlink('../../' . $p);
                    $formErrors[] =  'Erreur lors du traitement du fichier \n';
                }
            }
        } catch (PDOException $e) {
            foreach ($paths as $p) {
                unlink('../../' . $p);
                $formErrors[] =   'Erreur lors du traitement du fichier \n';
            }
        }
    } else {
        echo json_encode($formErrors);
    }
} else {
    $formErrors[] =  'Méthode non autorisée. \n';
}
