<?php
require_once '../../models/userModel.php';

if (isset($_GET['displayid'])) {
    $user = new user;
    $user->id = $_GET['displayid'];
    echo json_encode($user->getUserOne());
}

$deletUser = new user;
if (isset($_GET['deleteid']) && $deletUser->checkIfUserExists('id') != 0) {
    $deletUser->id = $_GET['deleteid'];
    if ($deletUser->deleteUser()) {
        $results['status'] = true;
        $results['data'] = $deletUser->listUser();
    } else {
        $results['status'] = false;
    }
    echo json_encode($results);
}
