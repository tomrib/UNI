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
$getDate->date = date('Y-m-d');
$todayDate = $getDate->getTodayDate();

// Obtenez l'ID de la date actuelle.
$id = $todayDate->id;

// Définissez l'ID de l'utilisateur à partir de la session.
$listCustomerName->id_users = $_SESSION['user']['id'];
$listCustomerName->id_dates = $id; // Utilisez l'ID de la date ici.

// Obtenez la liste des clients avec l'ID de la date.
$listName = $listCustomerName->getAddressCustomer();

// Obtenez la liste des types d'interventions.
$listTypes = new typesInterventions;
$listTypesInterventions = $listTypes->getTypesInterventions();

// Création d'une instance de la classe customersUser
$updateStarDate = new customersUser;
// Vérification si le formulaire n'a pas été soumis.
if (isset($_POST['arrivalButton'])) {
    // Vérification si $_POST n'est pas vide.
    if (!empty($_POST)) {

        // Récupération de l'ID de l'utilisateur depuis la session.
        if (!empty($_SESSION['user'])) {
            $updateStarDate->id_users = intval(strip_tags($_SESSION['user']['id']));
        } else {
            // Redirection vers la page de connexion si la session n'est pas définie.
            header('location:./Connexion');
            exit;
        }

        if (!empty($_POST['id_date'])) {
            if (preg_match($regex['numberCustomer'], $_POST['id_date'])) {
                // Assignation de la valeur de l'ID de dates.
                $updateStarDate->id_dates = intval(strip_tags($_POST['id_date']));
            }
        }

        // Vérification et validation du champ 'customer'.
        if (!empty($_POST['id_customers'])) {
            // Vérification que la saisie corespond bien a la regex.
            if (preg_match($regex['numberCustomer'], $_POST['id_customers'])) {
                // Vérification que l'ID du client existe dans la base de données.
                $updateStarDate->id_customers = intval(strip_tags($_POST['id_customers']));
              
            } else {
                $formErrors['id_customers'] = USER_CUSTOMER_ERROR_INVALID;
            }
        } else {
            $formErrors['id_customers'] = USER_CUSTOMER_ERROR_EMPTY;
        }

        // Vérification s'il n'y a pas d'erreurs dans le formulaire.
        if (count($formErrors) == 0) {
            // Exécution de la méthode startDateReal .
            $updateStarDate->startDateReal();
        }
    }
} else if (isset($_POST['endButton'])) {
    $updateendDate = new customersUser;
    // Vérification si $_POST n'est pas vide.
    if (!empty($_POST)) {

        // Récupération de l'ID de l'utilisateur depuis la session.
        if (!empty($_SESSION['user'])) {
            $updateendDate->id_users = intval(strip_tags($_SESSION['user']['id']));
        } else {
            // Redirection vers la page de connexion si la session n'est pas définie.
            header('location:./Connexion');
            exit;
        }

        if (!empty($_POST['id_date'])) {
            if (preg_match($regex['numberCustomer'], $_POST['id_date'])) {
                // Assignation de la valeur de l'ID de dates.
                $updateendDate->id_dates = intval(strip_tags($_POST['id_date']));
            }
        }
        // Vérification et validation du champ 'customer'.
        if (!empty($_POST['id_customers'])) {
            // Vérification que la saisie corespond bien a la regex.
            if (preg_match($regex['numberCustomer'], $_POST['id_customers'])) {
                // Vérification que l'ID du client existe dans la base de données.

                $updateendDate->id_customers = intval(strip_tags($_POST['id_customers']));

            } else {
                $formErrors['id_customers'] = USER_CUSTOMER_ERROR_INVALID;
            }
        } else {
            $formErrors['id_customers'] = USER_CUSTOMER_ERROR_EMPTY;
        }

        // Vérification s'il n'y a pas d'erreurs dans le formulaire.
        if (count($formErrors) == 0) {
            // Exécution de la méthode startDateReal .
            $updateendDate->endDateReal();
        }
    }
}




require_once '../../views/includes/headerStaff.php';
require_once '../../views/Staff.php';
require_once '../../views/includes/footerStaff.php';
