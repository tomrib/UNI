<?php
$regex = [
    'content' => '/(<script>)/',
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    'password' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
    'address' => '/^([1-9][0-9]*(?:-[1-9][0-9]*)*)[\s,-]+(?:(bis|ter|qua)[\s,-]+)?([\w]+[\-\w]*)[\s,]+([-\w].+)$/',
    'phone' => '/^(?:0)\s*[1-9](?:[\s.-]*\d{2}){4}$/',
    'contra' => '/^\d[012345]{1}\d$/',
    'cq' => '/^[1-478][0-9]{2}(0[1-9]|1[0-2]|62|63)(2[ABab]|[0-9]{2})(00[1-9]|0[1-9][0-9]|[1-8][0-9]{2}|9[0-8][0-9]|990)(00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})(0[1-9]|[1-8][0-9]|9[0-7])$/'
];

$mime_types = array(

);


define('BLOCK_ERROR_TEXT', 'Le mot script ne pas autorise');

define('BLOCK_ERROR_DELETE', 'Inposeble de supprime le commentaire');

define('USER_LASTNAME_ERROR_EMPTY', 'Le nom de famille est obligatoire.');
define('USER_LASTNAME_ERROR_INVALID', 'Le champ ne peut comporter que des lettres en majuscule et minuscule, des tirets ou des espaces. Il ne peut contenir que 20 caractères.');
define('USER_FIRSTNAME_ERROR_EMPTY', 'Le prénom est obligatoire.');


define('USER_EMAIL_ERROR_EMPTY', 'Le mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'l\'adresse mail nes pas valide');

define('USER_PASSWORD_EMPTY', 'Mot de passe et obligatoire');

define('USER_ADDRESS_ERROR_EMPTY', 'L\'adresse de domicile est obligatoire.');

define('USER_PHONE_ERROR_EMPTY', 'Le numero de téléphon est obligatoire.');
define('USER_PHONE_ERROR_INVALID', 'Le numero de téléphon ne pas valide.');

define('USER_CONTRA_ERROR_EMPTY','Le contra et obligatoire');
define('USER_CONTRA_ERROR_INVALID','La saisie ne pas valide');

define('USER_CQ_ERROR_EMPTY','La saisie ne pas valide');
define('USER_CQ_ERROR_INVALID','Le numero de securette social ne pas valide ');
define('USER_PASSWORD_ERROR_INVALID','L\'adresse mail ou mot de passe incorette');

