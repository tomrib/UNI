<?php
session_start();
require_once '../../models/userModel.php';
require_once '../../confi.php';

$listUser = new user;
$list = $listUser->listUser();

$deletUser = new user;
if (isset($_POST['delete']) && isset($_POST['id_suppression'])) {
    $deletUser->id = $_POST['id_suppression'];
    $deletUser->deleteUser();
}
if (count($_GET) > 0) {
    $reachUsers = new user;
    $reachUsers->lastname = $_GET['search'];
    $getReachUser = $reachUsers->seachUser();
}

/*
$modalUser = new user;
$modalUser->id = $_GET['id'];
$employeeData = $modelUser->getUserOne();
*/
require_once '../../views/includes/header.php';
require_once '../../views/employe/listEmploye.php';
require_once '../../views/includes/footer.php';