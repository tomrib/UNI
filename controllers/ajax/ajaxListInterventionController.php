<?php
session_start();
require_once '../../models/interventionsModel.php';

if (isset($_GET['displayid'])) {
    $user = new interventions;
    $user->id = $_GET['displayid'];
    echo json_encode($user->getInterventionOne());
}

$deletUser = new interventions;
if (isset($_GET['deleteid']) && $deletUser->checkIfInterventionExist('id') != 0) {
    $deletUser->id = $_GET['deleteid'];
    if ($deletUser->deleteIntervention()) {
        $results['status'] = true;
        $results['data'] = $deletUser->listIntervention();
    } else {
        $results['status'] = false;
    }
    echo json_encode($results);
} 
