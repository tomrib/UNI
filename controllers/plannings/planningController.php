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
require_once '../../views/includes/header.php';
require_once '../../views/plannings/planning.php';
require_once '../../views/includes/footer.php';
