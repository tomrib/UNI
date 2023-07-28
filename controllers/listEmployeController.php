<?php
require_once '../models/userModel.php';
$listUsers = new user;
$list = $listUsers->listUser();

if (count($_POST) > 0) {
    $delete = new user;
    $delete->id = $_POST['id_suppression'];
    $delete->deleteUser();
}

require_once '../views/includes/header.php';
require_once '../views/employe/listEmploye.php';
require_once '../views/includes/footer.php';