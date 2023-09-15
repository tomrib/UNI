<?php
session_start();
require_once '../../models/customerModel.php';
require_once '../../confi.php';
$formErrors = [];

$listCustomer = new customer;
$list = $listCustomer->listCustomer();

require_once '../../views/includes/header.php';
require_once '../../views/customers/listCustomer.php';
require_once '../../views/includes/footer.php';
