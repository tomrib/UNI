<?php
session_start();
require_once '../../models/interventionsModel.php';
require_once '../../models/imgInterventionModel.php';

if (isset($_GET['displayid'])) {
    $intervention = new interventions;
    $intervention->id = intval($_GET['displayid']);
    $data = $intervention->getInterventionOne();
    echo json_encode($data);
};

/* if (isset($_GET['displayidimg'])) { 
    $imgIntervention = new imginterventions;
    $imgIntervention->id_interventions = intval($_GET['displayidimg']); 
    $dataImg = $imgIntervention->getImgId();
    echo json_encode($dataImg);
} */


if (isset($_GET['deleteid']) && $deletUser->checkIfInterventionExist('id') != 0) {
    $deletUser = new interventions;
    $deletUser->id = intval($_GET['deleteid']);
    if ($deletUser->deleteIntervention()) {
        $results['status'] = true;
        $results['data'] = $deletUser->listIntervention();
    } else {
        $results['status'] = false;
    }
    echo json_encode($results);
};
