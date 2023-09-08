<?php
session_start();
require_once '../models/notesModel.php';
require_once '../confi.php';
$formErrors = [];
var_dump($_SESSION);



require_once '../views/includes/header.php';
require_once '../views/desk.php';
require_once '../views/includes/footer.php';
