<?php
require_once '../models/userModel.php';
require_once '../confi.php';

$listUser = new user;
$list = $listUser->listUser();

if(count($_POST) > 0)
{
$deletUser = new user;
$deletUser->id = $_POST['id_suppression'];
$deletUser->deleteUser();
}

require_once '../views/includes/header.php';
require_once '../views/employe/listEmploye.php';
require_once '../views/includes/footer.php';