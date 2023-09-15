<?php
session_start();
require_once '../../models/customersModel.php';


$customer = new customer;
$listCustomer = $customer->listCustomer();

require_once '../../views/includes/header.php';
require_once '../../views/customers/listCustomer.php';
require_once '../../views/includes/footer.php';
