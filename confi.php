<?php
$regex = [
    'content' => '/(<script>)/',
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'date' => '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',
    'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    'password' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
    'address' => '/^([1-9][0-9]*(?:-[1-9][0-9]*)*)[\s,-]+(?:(bis|ter|qua)[\s,-]+)?([\w]+[\-\w]*)[\s,]+([-\w].+)$/',
    'phone' => '/^(?:0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',
    'contra' => '/^[012345]{1}$/',
    'typeUser' => '/^[0123]{1}$/',
    'socialInsuranceNumber' => '/^[0-9]{1}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{3}[0-9]{3}$/'
];

$mime_types = array();


define('BLOCK_ERROR_TEXT', 'Le mot script ne pas autorise');

define('BLOCK_ERROR_DELETE', 'Inposeble de supprime le commentaire');

define('USER_LASTNAME_ERROR_EMPTY', 'Le nom de famille est obligatoire.');
define('USER_LASTNAME_ERROR_INVALID', 'Le champ ne peut comporter que des lettres en majuscule et minuscule, des tirets ou des espaces. Il ne peut contenir que 20 caractères.');
define('USER_FIRSTNAME_ERROR_EMPTY', 'Le prénom est obligatoire.');


define('USER_EMAIL_ERROR_EMPTY', 'Le mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'l\'adresse mail nes pas valide');

define('USER_PASSWORD_EMPTY', 'Mot de passe et obligatoire');
define('USER_PASSWORD_ERROR_INVALID', 'L\'adresse mail ou mot de passe incorette');

define('USER_ADDRESS_ERROR_EMPTY', 'L\'adresse de domicile est obligatoire.');

define('USER_PHONE_ERROR_EMPTY', 'Le numero de téléphon est obligatoire.');
define('USER_PHONE_ERROR_INVALID', 'Le numero de téléphon ne pas valide.');

define('USER_CONTRA_ERROR_EMPTY', 'Le contra et obligatoire');
define('USER_CONTRA_ERROR_INVALID', 'La saisie ne pas valide');

define('USER_CQ_ERROR_EMPTY', 'Le numero de securite social et obligatoire');
define('USER_CQ_ERROR_INVALID', 'Le numero de securette social ne pas valide');
define('USER_CQ_ERROR_EXIT', 'Le numero de securité social existe dechat');

define('USER_TYPE_ERROR_EMPTY', 'Types de postes et obligatoire.');
define('USER_TYPE_ERROR_INVALID', 'Types de postes ne pas valide.');

define('USER_CONTRACT_ERROR_EMPTY', 'La date de début et obligatoire.');
define('USER_CONTRACT_ERROR_INVALID', 'La date née pas valide.');
define('USER_CONTRACTEND_ERROR_EMPTY', 'La date de fin et obligatoire.');

define('USER_BIRTHAY_ERROR_EMPTY', 'La date de naissance et obligatoire.');
define('USER_BIRTHAY_ERROR_INVALID', 'La date de naissance née pas valide.');