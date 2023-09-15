<?php
session_start();
require_once '../../models/customersModel.php';
require_once '../../confi.php';
$formErrors = [];

$Customer = new customer;
$Customer->id = $_GET['id'];
$listCustomerOne = $Customer->getCustomerOne();

$updateCustomer = new customer;
$updateCustomer->id = $_GET['id'];
if (count($_POST) > 0) {


    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $updateCustomer->name =  strip_tags(strtoupper($_POST['name']));
        } else {
            $formErrors['name'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['name'] = USER_LASTNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['contactName'])) {
        if (preg_match($regex['name'], $_POST['contactName'])) {
            $updateCustomer->contactName = strip_tags(strtoupper($_POST['contactName']));
        } else {
            $formErrors['contactName'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['contactName'] = USER_NAME_ERROR_EMPTY;
    }

    if (!empty($_POST['address'])) {
        if (preg_match($regex['address'], $_POST['address'])) {
            $updateCustomer->address = strip_tags($_POST['address']);
        } else {
            $formErrors['address'] = USER_ADDRESS_ERROR_INVALID;
        }
    } else {
        $formErrors['address'] = USER_ADDRESS_ERROR_EMPTY;
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regex['phone'], $_POST['phone'])) {
            $updateCustomer->phone = strip_tags($_POST['phone']);
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
        }
    } else {
        $formErrors['phone'] = USER_PHONE_ERROR_EMPTY;
    }

    if (!empty($_POST['email'])) {
        if ($updateCustomer->checkIfCustomersExist('email') != 0) {
            if (preg_match($regex['email'], $_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $updateCustomer->email = strip_tags($_POST['email']);
                }
            } else {
                $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
            }
        } else {
            $formErrors['email'] = USER_EMAIL_ERROR_EXIT;
        }
    } else {
        $formErrors['email'] = USER_EMAIL_ERROR_EMPTY;
    }

    if (count($formErrors) == 0) {
        $updateCustomer->updateCustomer();
        header('Location:./Liste-Client');
    }
}
require_once '../../views/includes/header.php';
require_once '../../views/customers/updateCustomer.php';
require_once '../../views/includes/footer.php';
