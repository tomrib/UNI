<?php
session_start();
require_once '../../models/imgInterventionModel.php';
require_once '../../models/interventionsModel.php';
require_once '../../confi.php';
$listIntervention = new interventions;
$list = $listIntervention->listIntervention();

require_once '../../views/includes/header.php';
require_once '../../views/interventions/listIntervention.php';
require_once '../../views/includes/footer.php';
