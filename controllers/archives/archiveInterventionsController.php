<?php
session_start();
if ($_SESSION['user']['id_usersTypes'] == 1) {
    header('location:./Deconnecter');
    exit;
}
if (isset($_SESSION)) {
    header('location:./Connexion');
    exit;
}
require_once '../../views/includes/header.php';
require_once '../../views/archives/archiveInterventions.php';
require_once '../../views/includes/footer.php';
