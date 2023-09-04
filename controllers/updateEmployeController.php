<?php
session_start();
require_once '../models/userModel.php';
require_once '../models/contractTypesModel.php';
require_once '../models/userstypesModel.php';
require_once '../confi.php';
$formErrors = [];
//liste des contra
$listContra = new contractsTypes;
$contra = $listContra->listContractTypes();
//liste des types de poste 
$list = new typesUser;
$listTypeUser = $list->getTypesUsers();
// recupare les information de user par son id
$userId = new user;
$userId->id = $_GET['id'];
$userIdOne = $userId->getUserOne();
/**
 * on fait un count de post pour savoir s'il y a des élément a vérifier
 * on contrôle les élément de chaque champ séparément
 * pour chaque champ, on va vérifier que les champs ne sois pas vide 
 * et qu'il correspond a notre regex 
 * si le champs et vide ou que ça ne correspond pas a la regex un message 
 * d'erreur personnalise serra affiche pour chaque élément qui ne correspond pas
 */
$update = new user;
$update->id = $_GET['id'];
if (count($_POST) > 0) {
    if (!empty($_POST['typeUser'])) {
        if ($_POST['typeUser'] == 1 || $_POST['typeUser'] == 2 || $_POST['typeUser'] == 3) {
            $update->id_usersTypes =  strip_tags($_POST['typeUser']);
        } else {
            $formErrors['typeUser'] = USER_TYPE_ERROR_INVALID;
        }
    } else {
        $formErrors['typeUser'] = USER_TYPE_ERROR_EMPTY;
    }
    if (!empty($_POST['lastname'])) {
        if (preg_match($regex['name'], $_POST['lastname'])) {
            $update->lastname =  strip_tags(strtoupper($_POST['lastname']));
        } else {
            $formErrors['lastname'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['lastname'] = USER_LASTNAME_ERROR_EMPTY;
    }
    if (!empty($_POST['firstname'])) {
        if (preg_match($regex['name'], $_POST['firstname'])) {
            $update->firstname = strip_tags(ucwords($_POST['firstname']));
        } else {
            $formErrors['firstname'] = USER_LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['firstname'] = USER_FIRSTNAME_ERROR_EMPTY;
    }
    if (!empty($_POST['email'])) {
        if (preg_match($regex['email'], $_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $update->email = strip_tags($_POST['email']);
            }
        } else {
            $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
        }
    } else {
        $formErrors['email'] = USER_EMAIL_ERROR_EMPTY;
    }
    
    if (!empty($_POST['address'])) {
        if (preg_match($regex['address'], $_POST['address'])) {
            $update->address = strip_tags(strtoupper($_POST['address']));
        }
    } else {
        $formErrors['address'] = USER_ADDRESS_ERROR_EMPTY;
    }
    if (!empty($_POST['phone'])) {
        if (preg_match($regex['phone'], $_POST['phone'])) {
            $update->phone = strip_tags($_POST['phone']);
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
        }
    } else {
        $formErrors['phone'] = USER_PHONE_ERROR_EMPTY;
    }
    if (!empty($_POST['contra'])) {
        if ($_POST['contra'] == 1 || $_POST['contra'] == 2 || $_POST['contra'] == 3 || $_POST['contra'] == 4 || $_POST['contra'] == 5) {
            $update->id_contractsTypes = strip_tags($_POST['contra']);
        } else {
            $formErrors['contra'] = USER_CONTRA_ERROR_INVALID;
        }
    } else {
        $formErrors['contra'] = USER_CONTRA_ERROR_EMPTY;
    }
    if (!empty($_POST['socialInsuranceNumber'])) {
        if (preg_match($regex['socialInsuranceNumber'], $_POST['socialInsuranceNumber'])) {
            $update->socialInsuranceNumber = strip_tags($_POST['socialInsuranceNumber']);
        } else {
            $formErrors['socialInsuranceNumber'] = USER_CQ_ERROR_INVALID;
        }
    } else {
        $formErrors['socialInsuranceNumber'] = USER_CQ_ERROR_EMPTY;
    }
    /**
     * ci le count de formErrors et a 0 il envoit les element a la base de donne 
     * ci le count de formErrors et a 1 ou plus il ne pased pas dans la condition 
     *  */

    
    if (count($formErrors) == 0) {
        $update->updateUser();
    }
}

require_once '../views/includes/header.php';
require_once '../views/employe/updateEmploye.php';
require_once '../views/includes/footer.php';
