<?php
session_start();
/**
 * Contrôle les accès utilisateur.
 *Redirection vers la connexion.
 *Arrête la lecture de code.
 */
if ($_SESSION['user']['id_usersTypes'] === 2) {
    header('location:./Connexion');
    exit;
}
require_once '../../models/customersUserModel.php';
require_once '../../models/customersModel.php';
require_once '../../models/userModel.php';
require_once '../../models/dateModel.php';
require_once '../../models/interventionsModel.php';
require_once '../../models/typesInterventionsModel.php';
require_once '../../models/imgInterventionModel.php';
require_once '../../confi.php';
// Un tableau vide pour stocker les erreurs de formulaire.
$formErrors = [];
$mime_types = [];

// Créez un nouvel objet CustomersUser 
$listCustomerName = new CustomersUser();

// Créez un objet pour obtenir la date actuelle.
$getDate = new date;
$todayDate = $getDate->getTodayDate();

// Définissez l'ID de l'utilisateur à partir de la session.
$listCustomerName->id_users = $_SESSION['user']['id'];
// recupaire l'ID de la date.
$listCustomerName->id_dates = $todayDate->id;

// Obtenez la liste des clients avec l'ID de la date.
$listName = $listCustomerName->getAddressCustomer();

// Créez un objet pour obtenir liste des types intervention.
$listTypes = new typesInterventions;
// Obtenez la liste des types d'interventions.
$listTypesInterventions = $listTypes->getTypesInterventions();

// Créez un objet pour les nouvelle intervention.
if (!empty($_POST)) {
 /*    $addIntervention = new interventions;
    if (!empty($_POST['textIntervention'])) {
        if (!preg_match($regex['content'], $_POST['textIntervention'])) {
            $addIntervention->text = strip_tags($_POST['textIntervention']);
        } else {
            $formErrors['textIntervention'] = BLOCK_ERROR_TEXT;
        }
    } else {
        $formErrors['textIntervention'] = INTERVENTION_ERREUR_EMPTY;
    }

    if (!empty($_POST['timeIntervention'])) {
        if (preg_match($regex['time'], $_POST['timeIntervention'])) {
            $addIntervention->reportingTime = strip_tags($_POST['timeIntervention']);
        } else {
            $formErrors['timeIntervention'] = INTERVENTION_ERREUR_TIME_INVALID;
        }
    } else {
        $formErrors['timeIntervention'] = INTERVENTION_ERREUR_TIME_EMPTY;
    }
    $addIntervention->id_customers  = intval(strip_tags($_POST['nameCustomer']));
    $addIntervention->id_users  = $_SESSION['user']['id'];
    $addIntervention->id_typesInterventions = intval(strip_tags($_POST['TypesInterventions']));

    $addIntervention->reportingDate = date('Y-m-d');

 */
    $addImg = new imginterventions;

    // Vérifiez si un fichier a été téléchargé
    if ($_FILES['imgIntervention']['error'] != UPLOAD_ERR_NO_FILE) {
        
        // Vérifiez les erreurs de téléchargement
        if ($_FILES['imgIntervention']['error'] != UPLOAD_ERR_PARTIAL && $_FILES['imgIntervention']['error'] != UPLOAD_ERR_FORM_SIZE) {
            
            // Si aucune erreur de téléchargement, continuez le traitement
            if ($_FILES['imgIntervention']['error'] == UPLOAD_ERR_OK) {
                
                // Obtenez les informations sur le fichier
                $fileInfo = pathinfo($_FILES['imgIntervention']['name']);
                
                // Vérifiez le type MIME du fichier téléchargé
                if (!array_key_exists($fileInfo['extension'], $mime_types) || mime_content_type($_FILES['imgIntervention']['tmp_name']) != $mime_types[$fileInfo['extension']]) {
                    $formErrors['imgIntervention'] = STAFF_INTERVANTION_IMG_WEIGHT;
                }
            }
        } else {
            $formErrors['imgIntervention'] = STAFF_INTERVANTION_IMG_WEIGHT;
        }
    } else {
        $formErrors['imgIntervention'] = STAFF_INTERVANTION_IMG_EMPTY;
    }
    
    // Définissez le chemin de destination du fichier téléchargé
    $path = 'assets/img/photoInterventions/' . uniqid() . '.' . $fileInfo['extension'];
    
    // Déplacez le fichier téléchargé vers le chemin de destination
    if (move_uploaded_file($_FILES['imgIntervention']['tmp_name'], '../../' . $path)) {
        chmod('../../' . $path, '664');
        $addImg->img = $path;
    }
    
    // Si aucune erreur n'a été détectée, ajoutez l'image à l'intervention
    if (count($formErrors) == 0) {
       /*  $addImg->id_interventions = $addIntervention->addIntervention(); */
        $addImg->addImgIntervention();
    }
    

}


require_once '../../views/includes/headerStaff.php';
require_once '../../views/Staff.php';
require_once '../../views/includes/footerStaff.php';
