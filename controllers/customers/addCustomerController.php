<?php
session_start();
require_once '../../models/custommerModel.php';
require_once '../../confi.php';
$formErrors = [];

$newCstommer = new business;
if (count($_POST) > 0) {
    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $newCstommer->name =  strip_tags(strtoupper($_POST['name']));
        } else {
            $formErrors['lastname'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['name'] = USER_LASTNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['contactName'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $newCstommer->contactName = strip_tags(strtoupper($_POST['contactName']));
        } else {
            $formErrors['lastname'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['contactName'] = USER_NAME_ERROR_EMPTY;
    }

    if (!empty($_POST['address'])) {
        if (preg_match($regex['address'], $_POST['address'])) {
            $newCstommer->address = strip_tags($_POST['address']);
        }
    } else {
        $formErrors['address'] = USER_ADDRESS_ERROR_EMPTY;
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regex['phone'], $_POST['phone'])) {
            $newCstommer->phone = strip_tags($_POST['phone']);
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
        }
    } else {
        $formErrors['phone'] = USER_PHONE_ERROR_EMPTY;
    }

    if (!empty($_POST['email'])) {
        if ($newCstommer->checkIfCustomeExists('email') != 0) {
            if (preg_match($regex['email'], $_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $newCstommer->email = strip_tags($_POST['email']);
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
        $newCstommer->addCustomer();
        header('Location:./Liste-Client');
    }
}

require_once '../../views/includes/header.php';
require_once '../../views/customer/addCustomer.php';
require_once '../../views/includes/footer.php';