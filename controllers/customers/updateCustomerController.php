<?php
session_start();
require_once '../../models/custommerModel.php';
require_once '../../confi.php';
$formErrors = [];

$listCustomer = new business;
$listCustomer->id = $_GET['id'];
$listCustomerOne = $listCustomer->getCustomerOne();

$updateCustomer = new business;
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
        if (preg_match($regex['name'], $_POST['name'])) {
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
        }{
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
        if ($updateCustomer->checkIfCustomeExists('email') != 0) {
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
var_dump($_POST);
var_dump($formErrors);
    if (count($formErrors) == 0) {
        $updateCustomer->updateCustomer();
       /*  header('Location:./Liste-Client'); */
    }
}
require_once '../../views/includes/header.php';
require_once '../../views/customer/updateCustomers.php';
require_once '../../views/includes/footer.php';