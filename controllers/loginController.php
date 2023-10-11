<?php
// Démarrez la session (si elle n'est pas déjà démarrée)
session_start();
// Inclure les fichiers nécessaires
require_once "models/userModel.php";
require_once "confi.php";

// Initialisez le tableau des erreurs de formulaire
$formErrors = [];

// Créez une instance de la classe 'user'
$user = new user;

// Traitement du formulaire lorsque des données POST sont soumises
if (count($_POST) > 0) {
    if (!empty($_POST['loginEmail'])) {
        $user->email = $_POST['loginEmail'];

        // Vérifiez si l'utilisateur existe avec cet e-mail
        if ($user->checkIfUsersExist('email') > 0) {
            $password = $user->getPassword();

            // Vérifiez si le mot de passe est correct
            if (isset($password) && password_verify($_POST['loginPassword'], $password)) {
                $_SESSION['user'] = $user->getId();

                // Redirigez l'utilisateur en fonction de son type
                if ($_SESSION['user']['id_usersTypes'] == 2 || $_SESSION['user']['id_usersTypes'] == 3) {
                    header('Location: ./Bureau');
                    exit;
                } elseif ($_SESSION['user']['id_usersTypes'] == 1) {
                    header('Location: ./Espace-Employés');
                    exit;
                }
            } else {
                $formErrors['loginEmail'] = LOGIN_PASSWORD_ERROR_INVALID; // Message d'erreur pour un mot de passe incorrect
            }
        } else {
            $formErrors['loginEmail'] = LOGIN_PASSWORD_ERROR_INVALID; // Message d'erreur pour un e-mail invalide
        }
    } else {
        $formErrors['loginEmail'] = LOGIN_PASSWORD_ERROR_INVALID; 
    }
}
