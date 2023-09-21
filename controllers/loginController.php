<?php
session_start();
require_once "models/userModel.php";
require_once "confi.php";
$formErrors = [];
$user = new user;
if (count($_POST) > 0) {
    if (!empty($_POST['loginEmail'])) {
        $user->email = $_POST['loginEmail'];
        if ($user->checkIfUsersExist('email') > 0) {
            $password = $user->getPassword();
        } else {
            $formErrors['loginEmail'] = USER_PASSWORD_ERROR_INVALID;
        }
    } else {
        $formErrors['loginEmail'] = USER_EMAIL_ERROR_EMPTY;
    }
    if (!empty($_POST['loginPassword'])) {
        if (isset($password)) {
            if (password_verify($_POST['loginPassword'], $password)) {
                $_SESSION['user'] = $user->getId();
                if ($_SESSION['user']['id_usersTypes'] === 2 || $_SESSION['user']['id_usersTypes'] === 3) {
                    header('location:./Bureau');
                    exit;
                }
                if ($_SESSION['user']['id_usersTypes'] === 1) {
                    header('location:./Espace-Employés');
                    exit;
                }
            } else {
                $formErrors['loginEmail'] = USER_PASSWORD_ERROR_INVALID;
            }
        } else {
            $formErrors['loginEmail'] = USER_PASSWORD_ERROR_INVALID;
        }
    } else {
        $formErrors['loginEmail'] = USER_PASSWORD_EMPTY;
    }
}
