<?php
session_start();
if ($_SESSION['user']['id_usersTypes'] == 1) {
    header('location:./Deconnecter');
    exit;
}
if ($_SESSION['user'] == '') {
    header('location:./Connexion');
    exit;
}
require_once '../../models/interventionsModel.php';
require_once '../../models/customersModel.php';
require_once '../../models/typesInterventionsModel.php';
require_once '../../confi.php';
$formErrors = [];

$addCustomer = new customer;
$add = $addCustomer->getCustomerAddAdmin();

$type = new typesInterventions;
$intervention = $type->getTypesInterventions();

if (count($_POST) > 0) {
    $addIntervention = new interventions;
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
            $formErrors['textIntervention'] =  BLOCK_ERROR_TEXT;
        }
    } else {
        $formErrors['textIntervention'] =  INTERVENTION_ERREUR_EMPTY;
    }
    
    if (!empty($_POST['date'])) {
        $addIntervention->reportingDate =strip_tags($_POST['date']);
    } else {
        $formErrors['date'] =  ERREUR_ADMIN_INVALID;
    }
    if (!empty($_POST['timeIntervention'])) {
        if (preg_match($regex['time'], $_POST['timeIntervention'])) {
            $addIntervention->reportingTime = strip_tags($_POST['timeIntervention']);
        } else {
            $formErrors['timeIntervention'] =  INTERVENTION_ERREUR_TIME_INVALID;
        }
    } else {
        $formErrors['timeIntervention'] =  INTERVENTION_ERREUR_TIME_EMPTY;
    }
    if (!empty($_POST['id_customer'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_customer'])) {
            $addIntervention->id_customers = intval(strip_tags($_POST['id_customer']));
        } else {
            $formErrors['id_customer'] =  USER_CUSTOMER_ERROR_INVALID;
        }
    } else {
        $formErrors['id_customer'] =  USER_CUSTOMER_ERROR_EMPTY;
    }
    if (!empty($_POST['id_typesInterventions'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_typesInterventions'])) {
            $addIntervention->id_typesInterventions = intval(strip_tags($_POST['id_typesInterventions']));
        } else {
            $formErrors['id_typesInterventions'] =  USER_ERREUR_TYPEINTERVENTIO_INVALID;
        }
    } else {
        $formErrors['id_typesInterventions'] =  USER_ERREUR_TYPEINTERVENTIO_EMPTY;
    }
    if (count($formErrors) == 0) {
        $addIntervention->addIntervention();
        header('location:./Liste-Intervention');
    }
};



require_once '../../views/includes/header.php';
require_once '../../views/interventions/addIntervention.php';
require_once '../../views/includes/footer.php';
