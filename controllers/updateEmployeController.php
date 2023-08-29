<?php
require_once '../models/userModel.php';
require_once '../models/contractTypesModel.php';
require_once '../confi.php';
$formErrors = [];
$listContra = new contractsTypes;
$contra = $listContra->listContractTypes();
if (count($_GET)>0) {
    $listUser = new user;
    $listUser->id = $_GET['Modifier'];
    $userId = $listUser->UserOne();
}

require_once '../views/includes/header.php';
require_once '../views/employe/updateEmploye.php';
require_once '../views/includes/footer.php';