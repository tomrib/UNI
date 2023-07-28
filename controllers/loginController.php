<?php
require_once "../models/userModel.php";
require_once "../confi.php";
$formErrors = [];
$user = new user;
if (count($_POST) > 0) {
    if (!empty($_POST['loginEmail'])) {
        $user->email = $_POST['loginEmail'];
        if ($user->checkIfUserExists('email') > 0) {
            $password = $user->getPassword();
        } else {
            $formErrors['loginEmail'] = USER_PASSWORD_ERROR_INVALID;
        }
    } else {
        $formErrors['loginEmail'] = USER_EMAIL_ERROR_EMPTY;
    }
    if (!empty($_POST['loginPassword'])) {
        if (isset($password)) {
            if (password_verify( $password,$_POST['loginPassword'])) {
                var_dump($_POST['loginPassword']);die('ff');
                $_SESSION['user'] = $user->getIds();
                header('Location: ./bureau');
                exit;
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
require_once "../index.php";