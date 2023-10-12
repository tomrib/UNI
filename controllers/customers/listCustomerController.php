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
require_once '../../models/customersModel.php';


$customer = new customer;
$listCustomer = $customer->listCustomer();

require_once '../../views/includes/header.php';
require_once '../../views/customers/listCustomer.php';
require_once '../../views/includes/footer.php';
