<?php
require_once '../models/userModel.php';
require_once '../confi.php';
$formErrors = [];
$add = new user;
if (!empty('validationEmployees')) {
    if (count($_POST) > 0) {

        if (!empty($_POST['lastname'])) {
            if (preg_match($regex['name'], $_POST['lastname'])) {
                $add->lastname =  strip_tags(strtoupper($_POST['lastname']));
            } else {
                $formErrors['lastname'] = USER_LASTNAME_ERROR_INVALID;
            }
        } else {
            $formErrors['lastname'] = USER_LASTNAME_ERROR_EMPTY;
        }

        if (!empty($_POST['firstname'])) {
            if (preg_match($regex['name'], $_POST['firstname'])) {
                $add->firstname = strip_tags(ucwords($_POST['firstname']));
            } else {
                $formErrors['firstname'] = USER_LASTNAME_ERROR_INVALID;
            }
        } else {
            $formErrors['firstname'] = USER_FIRSTNAME_ERROR_EMPTY;
        }

        if (!empty($_POST['email'])) {
            if (preg_match($regex['email'], $_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $add->email = strip_tags($_POST['email']);
                }
            } else {
                $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
            }
        } else {
            $formErrors['email'] = USER_EMAIL_ERROR_EMPTY;
        }

        if (!empty($_POST['password'])) {
            if (preg_match($regex['password'], $_POST['password'])) {
            $add->password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            } 
        } else {
            $formErrors['password'] = USER_PASSWORD_EMPTY;
        }

        if (!empty($_POST['address'])) {
            if (preg_match($regex['address'], $_POST['address'])) {
                $add->address = strip_tags(strtoupper($_POST['address']));
            } 
        } else {
            $formErrors['address'] = USER_ADDRESS_ERROR_EMPTY;
        }

        if (!empty($_POST['phone'])) {
            if (preg_match($regex['phone'], $_POST['phone'])) {
            $add->phone = $_POST['phone'];
            } else {
                $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
            }
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_EMPTY;
        }

        if (!empty($_POST['contra'])) {
            if (preg_match($regex['contra'],$_POST['contra'])) {
                $add->contra = $_POST['contra'];
            } else {
                $formErrors['contra'] = USER_CONTRA_ERROR_INVALID;
            }
        } else {
            $formErrors['contra'] = USER_CONTRA_ERROR_EMPTY ;
        }

        if (!empty($_POST['cq'])) {
            if (preg_match($regex['cq'],$_POST['cq'])) {
            $add->cq = $_POST['cq'];
            } else {
                $formErrors['cq'] = USER_CQ_ERROR_INVALID;
            }
        } else {
            $formErrors['cq'] = USER_CQ_ERROR_EMPTY;
        }

        if (count($formErrors) == 0) {
            $add->addUser();
        }
    }
}

require_once '../views/includes/header.php';
require_once '../views/addEmploy.php';
require_once '../views/includes/footer.php';