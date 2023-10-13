<?php
session_start();
if ($_SESSION['user']['id_usersTypes'] == 1) {
    header('location:./Deconnecter');
    exit;
}
if ($_SESSION['user'] == '') {
    header('location:./Connexion');
    exit;
}
require_once '../../models/subcontractorModel.php';
require_once '../../models/typesInterventionsModel.php';
require_once '../../confi.php';
//je crée un nouvelle objet qui retour id , et le name des sous traiten
$listSubcontractor = new subcontractor;
$list = $listSubcontractor->listSubcontractor();

require_once '../../views/includes/header.php';
require_once '../../views/interventions/updateIntervention.php';
require_once '../../views/includes/footer.php';
