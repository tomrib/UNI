<?php
require_once '../../models/customersUserModel.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        // Répondez au client (vous pouvez renvoyer un message JSON, du texte, etc.)
        echo json_encode(['message' => 'Arrivée enregistrée avec succès']);
    } elseif (isset($_POST['endButton'])) {

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
            // Répondez au client (vous pouvez renvoyer un message JSON, du texte, etc.)
            echo json_encode(['message' => 'Fin d\'intervention enregistrée avec succès']);
        } else {
            // Aucun bouton valide n'a été cliqué, renvoyez un message d'erreur
            echo json_encode(['error' => 'Action non valide']);
        }
    }
}
