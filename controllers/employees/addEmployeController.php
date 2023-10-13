<?php
session_start();
if ($_SESSION['user']['id_usersTypes'] == 1) {
    header('location:./Deconnecter');
    exit;
}
if ($_SESSION['user'] == '') {
    header('location:./Connexion');
    exit;
}
require_once '../../models/userModel.php';
require_once '../../models/contractTypesModel.php';
require_once '../../confi.php';
$formErrors = [];
$formInfo = [];
$listContract = new contractsTypes;
$contract = $listContract->listContractTypes();
$add = new user;
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
    if (!empty($_POST['birthday'])) {
        if (preg_match($regex['date'], $_POST['birthday'])) {
            $add->birthday = strip_tags($_POST['birthday']);
            $dateOfBirth = new DateTime($add->birthday);
            $currentDate = new DateTime();
            $difference = $dateOfBirth->diff($currentDate);
            $age = $difference->y;
            if ($age <= 18) {
                $formInformation['birthday'] = USER_BIRTHAY_INFO_INVALID;
            }
        } else {
            $formErrors['birthday'] = USER_BIRTHAY_ERROR_INVALID;
        }
    } else {
        $formErrors['birthday'] = USER_BIRTHAY_ERROR_EMPTY;
    }

    if (!empty($_POST['email'])) {
        if ($add->checkIfUsersExist('email') > 0) {
            if (preg_match($regex['email'], $_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $add->email = strip_tags($_POST['email']);
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

    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {
            $add->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = USER_PASSWORD_ERROR_INVALID;
        }
    } else {
        $formErrors['password'] = USER_PASSWORD_EMPTY;
    }

    if (!empty($_POST['address'])) {
        if (preg_match($regex['address'], $_POST['address'])) {
            $add->address = strip_tags($_POST['address']);
        } else {
            $formErrors['address'] = USER_ADDRESS_ERROR_INVALID;
        }
    } else {
        $formErrors['address'] = USER_ADDRESS_ERROR_EMPTY;
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regex['phone'], $_POST['phone'])) {
            $add->phone = strip_tags($_POST['phone']);
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
        }
    } else {
        $formErrors['phone'] = USER_PHONE_ERROR_EMPTY;
    }

    if (!empty($_POST['socialInsuranceNumber'])) {
        if (preg_match($regex['socialInsuranceNumber'], $_POST['socialInsuranceNumber'])) {
            $add->socialInsuranceNumber = strip_tags($_POST['socialInsuranceNumber']);
        } else {
            $formErrors['socialInsuranceNumber'] = USER_SOCIALINSURANCE_ERROR_INVALID;
        }
    } else {
        $formErrors['socialInsuranceNumber'] = USER_SOCIALINSURANCE_ERROR_EMPTY;
    }

    if (!empty($_POST['contract'])) {
        if (preg_match($regex['number'], $_POST['contract'])) {
            $add->id_contractsTypes = intval(strip_tags($_POST['contract']));
        } else {
            $formErrors['contract'] = USER_CONTRACT_ERROR_INVALID;
        }

        if (!empty($_POST['beginningContract'])) {
            if (preg_match($regex['date'], $_POST['beginningContract'])) {
                $add->beginningContract = strip_tags($_POST['beginningContract']);
            } else {
                $formErrors['beginningContract'] = USER_DATE_ERROR_INVALID;
            }
        } else {
            $formErrors['beginningContract'] = USER_BEGINNINGCONTRACT_ERROR_EMPTY;
        }

        if ($_POST['contract'] === 2 || $_POST['contract'] === 3) {
            if (!empty($_POST['endContract'])) {
                if (preg_match($regex['date'], $_POST['endContract'])) {
                    $add->endContract = strip_tags($_POST['endContract']);
                    $beginningContract = new DateTime($add->beginningContract);
                    $endContract = new DateTime($add->endContract);

                    if ($beginningContract > $endContract) {
                        $formErrors['endContract'] = USER_CONTRACTEND_ERROR;
                    }
                } else {
                    $formErrors['endContract'] = USER_DATE_ERROR_INVALID;
                }
            } else {
                $formErrors['endContract'] = USER_BEGINNINGCONTRACT_ERROR_EMPTY;
            }
        }
    } else {
        $formErrors['contract'] = USER_CONTRACT_ERROR_EMPTY;
    }
    if (count($formErrors) == 0) {
        $add->addUser();
        header('Location:./Liste-Employer');
    }
}


require_once '../../views/includes/header.php';
require_once '../../views/employees/addEmploye.php';
require_once '../../views/includes/footer.php';
