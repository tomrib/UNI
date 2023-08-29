<?php
session_start();
require_once './models/userModel.php';

$user = new user;

if (count($_POST) > 0) {

    if (!empty($_POST['loginEmail'])) {
        $user->email = $_POST['loginEmail'];
        if ($user->checkIfUserExists('email') > 0) {
            $password = $user->getPassword();
        } 
    } 

    if (!empty($_POST['loginPassword'])) {
        if (isset($password)) {
            if (password_verify($_POST['loginPassword'], $password)) {
                $_SESSION['user'] = $user->getIds();
                header('Location: ./employer');
                exit;
            } 
        } 
    } 
}