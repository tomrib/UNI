<?php
$regex = [
    'content' => '/^.*<\/script>.*$/',
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'date' => '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',
    'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    'password' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
    'address' => '/^([1-9][0-9]*(?:-[1-9][0-9]*)*)[\s,-]+(?:(bis|ter|qua)[\s,-]+)?([\w]+[\-\w]*)[\s,]+([-\w].+)$/',
    'phone' => '/^(?:0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',
    'contract' => '/^[012345]{1}$/',
    'typeUser' => '/^[0123]{1}$/',
    'socialInsuranceNumber' => '/^[0-9]{1} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{3} [0-9]{3}$/'
];

$mime_types = array();


define('BLOCK_ERROR_TEXT', 'Le mot "script" n\'est pas autorisé.');
define('BLOCK_ERROR_TEXT_EMPTY', 'Merci de remplir votre note avant de valider.');

define('BLOCK_ERROR_DELETE', 'Impossible de supprimer le commentaire.');

define('USER_LASTNAME_ERROR_EMPTY', 'Le nom de famille est obligatoire.');
define('USER_NAME_ERROR_EMPTY', 'Le nom du contact est obligatoire.');
define('USER_LASTNAME_ERROR_INVALID', 'Le champ ne peut contenir que des lettres en majuscules et minuscules, des tirets ou des espaces, et il ne peut pas dépasser 20 caractères.');
define('USER_FIRSTNAME_ERROR_EMPTY', 'Le prénom est obligatoire.');


define('USER_EMAIL_ERROR_EMPTY', 'L\'e-mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'l\'adresse n\'est pas valide.');
define('USER_EMAIL_ERROR_EXIT', 'L\'adresse mail existe déjà.');

define('USER_PASSWORD_EMPTY', 'Le mot de passe est obligatoire.');
define('USER_PASSWORD_ERROR_INVALID', 'L\'adresse mail ou le mot de passe est incorrect.');

define('USER_ADDRESS_ERROR_EMPTY', 'L\'adresse de domicile est obligatoire.');
define('USER_ADDRESS_ERROR_INVALID', 'L\'adresse n\'est pas conforme, il faut un ou plusieurs numéros, types de rue et nom de rue.');

define('USER_PHONE_ERROR_EMPTY', 'Le numéro de téléphone est obligatoire.');
define('USER_PHONE_ERROR_INVALID', 'Le numéro de téléphone n\'est pas valide.');

define('USER_CONTRACT_ERROR_EMPTY', 'Le contrat est obligatoire.');
define('USER_CONTRACT_ERROR_INVALID', 'La saisie n\'est pas valide.');

define('USER_SOCIALINSURANCE_ERROR_EMPTY', 'Le numéro de sécurité sociale est obligatoire.');
define('USER_SOCIALINSURANCE_ERROR_INVALID', 'Le numéro de sécurité sociale n\'est pas valide.');

define('USER_TYPE_ERROR_EMPTY', 'Les types de postes sont obligatoires.');
define('USER_TYPE_ERROR_INVALID', 'Les types de postes ne sont pas valides.');

define('USER_BEGINNINGCONTRACT_ERROR_EMPTY', 'La date de début est obligatoire.');
define('USER_DATE_ERROR_INVALID', 'La date n\'est pas valide.');
define('USER_CONTRACTEND_ERROR_EMPTY', 'La date de fin est obligatoire.');
define('USER_CONTRACTEND_ERROR', 'La date de fin de contrat doit être postérieure à la date de début de contrat.');

define('USER_BIRTHAY_ERROR_EMPTY', 'La date de naissance est obligatoire.');
define('USER_BIRTHAY_ERROR_INVALID', 'La date de naissance n\'est pas valide.');
define('USER_BIRTHAY_INFO_INVALID', '⚠️ Attention, le profil suivant est âgé de moins de 18 ans ⚠️');
