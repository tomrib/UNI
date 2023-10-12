<?php
session_start();
/**
 * Contrôle les accès utilisateur.
 *Redirection vers la connexion.
 *Arrête la lecture de code.
 */
if ($_SESSION['user']['id_usersTypes'] == 2 ) {
    header('location:./Deconnecter');
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

require_once '../../views/includes/headerStaff.php';
require_once '../../views/Staff.php';
require_once '../../views/includes/footerStaff.php';