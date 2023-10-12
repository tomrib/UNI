<?php
session_start();
if ($_SESSION['user']['id_usersTypes'] == 1) {
    header('location:./Deconnecter');
    exit;
}
require_once '../../views/includes/header.php';
require_once '../../views/archives/archiveCustomers.php';
require_once '../../views/includes/footer.php';
