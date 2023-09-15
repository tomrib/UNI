<?php
session_start();
require_once '../models/customersUserModel.php';
require_once '../models/customersModel.php';
require_once '../models/userModel.php';
require_once '../models/interventions.php';
require_once '../models/typesInterventionsModel.php';
require_once '../confi.php';
$formErrors = [];

$listTypes = new typesInterventions;
$listTypesInterventions =$listTypes->getTypesInterventions();