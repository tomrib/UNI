<?php
session_start();
require_once '../models/businessUserModel.php';
require_once '../models/customerModel.php';
require_once '../models/userModel.php';
require_once '../models/interventions.php';
require_once '../models/typesInterventionsModel.php';
require_once '../confi.php';
$formErrors = [];

$listTypes = new typesInterventions;
$listTypesInterventions = $listTypes->getTypesInterventions();
