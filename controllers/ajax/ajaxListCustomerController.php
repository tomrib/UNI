<?php
require_once '../../models/customerModel.php';

if (isset($_GET['displayid'])) {
    $customer = new customer;
    $customer->id = $_GET['displayid'];
    echo json_encode($customer->getCustomerOne());
}

$deletCustomer = new customer;
if (isset($_GET['deleteid']) && $deletCustomer->checkIfCustomersExist('id') != 0) {
    $deletCustomer->id = $_GET['deleteid'];
    if ($deletCustomer->deleteCustomer()) {
        $results['status'] = true;
        $results['data'] = $deletCustomer->listCustomer();
    } else {
        $results['status'] = false;
    }
    echo json_encode($results);
}
