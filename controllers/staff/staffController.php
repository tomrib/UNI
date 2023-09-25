<?php
session_start();
require_once '../../models/customersUserModel.php';
require_once '../../models/customersModel.php';
require_once '../../models/userModel.php';
require_once '../../models/dateModel.php';
require_once '../../models/interventions.php';
require_once '../../models/typesInterventionsModel.php';
require_once '../../confi.php';
$formErrors = []; // Un tableau vide pour stocker les erreurs de formulaire.

// Créez un nouvel objet CustomersUser pour travailler avec les données des clients.
$listCustomerName = new CustomersUser();

// Créez un objet pour obtenir la date actuelle.
$getDate = new date;
$todayDate = $getDate->getTodayDate();


// Définissez l'ID de l'utilisateur à partir de la session.
$listCustomerName->id_users = $_SESSION['user']['id'];
$listCustomerName->id_dates = $todayDate->id;

// Obtenez la liste des clients avec l'ID de la date.
$listName = $listCustomerName->getAddressCustomer();

// Obtenez la liste des types d'interventions.
$listTypes = new typesInterventions;
$listTypesInterventions = $listTypes->getTypesInterventions();

require_once '../../views/includes/headerStaff.php';
require_once '../../views/Staff.php';
require_once '../../views/includes/footerStaff.php';
