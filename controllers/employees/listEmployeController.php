<?php
session_start();
require_once '../../models/userModel.php';

$user = new user;
$listUsers = $user->listUser();

require_once '../../views/includes/header.php';
require_once '../../views/employees/listEmploye.php';
require_once '../../views/includes/footer.php';
