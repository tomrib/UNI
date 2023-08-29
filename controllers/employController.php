<?php
require_once '../models/userModel.php';
$listUsers = new user;
$list = $listUsers->listUser();
require_once '../views/includes/header.php';
require_once '../views/employ.php';
require_once '../views/includes/footer.php';