<?php
require_once '../../models/custommerModel.php';
require_once '../../confi.php';
$formErrors = [];

$listCustomer = new business;
$list = $listCustomer->getCustommer();

$deletUser = new business;
if (isset($_POST['delete']) && isset($_POST['id_suppression'])) {
    $deletUser->id = $_POST['id_suppression'];
    $deletUser->deleteCustommer();
}
require_once '../../views/includes/header.php';
require_once '../../views/customer/listCustomer.php';
require_once '../../views/includes/footer.php';
