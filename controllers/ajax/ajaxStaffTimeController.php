<?php
require_once '../../models/customersUserModel.php';
require_once '../../confi.php';

session_start();

$formErrors = [];

$column = ($_GET['action'] == 'arrival' ? 'startDateReal' : 'endDateReal');
$updateDate = new customersUser;

// Récupération de l'ID de l'utilisateur depuis la session.
if (!empty($_SESSION['user'])) {
    $updateDate->id_users = intval(strip_tags($_SESSION['user']['id']));
} else {
    // Redirection vers la page de connexion si la session n'est pas définie.
    header('location:./Connexion');
    exit;
}

if (!empty($_GET['id_date'])) {
    if (preg_match($regex['numberCustomer'], $_GET['id_date'])) {
        // Assignation de la valeur de l'ID de dates.
        $updateDate->id_dates = intval(strip_tags($_GET['id_date']));
    }
}

// Vérification et validation du champ 'customer'.
if (!empty($_GET['id_customers'])) {
    // Vérification que la saisie corespond bien a la regex.
    if (preg_match($regex['numberCustomer'], $_GET['id_customers'])) {
        // Vérification que l'ID du client existe dans la base de données.
        $updateDate->id_customers = intval(strip_tags($_GET['id_customers']));
    } else {
        $formErrors['id_customers'] = USER_CUSTOMER_ERROR_INVALID;
    }
} else {
    $formErrors['id_customers'] = USER_CUSTOMER_ERROR_EMPTY;
}

if (count($formErrors) == 0) {
    // Exécution de la méthode startDateReal .
    if($updateDate->updateDateReal($column)){
        $formErrors['success'] = ($_GET['action'] == 'arrival' ? 'Arrivée enregistrée avec succès' : 'Départ enregistré avec succès');
    } else {
        $formErrors['success'] = 'Un problème est survenu';
    }
}

echo json_encode($formErrors);