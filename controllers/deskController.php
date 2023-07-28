<?php
require_once '../models/userModel.php';
require_once '../models/blockModel.php';
require_once '../confi.php';
$formErrors = [];


$count = new block;
$countBlock = $count->countBlock();

$addBlock = new block;
if (!empty('btnBlockValidation')) {
    if (!empty($_POST['blocNote'])) {
        if (!preg_match($regex['content'], $_POST['blocNote'])) {

            $addBlock->text = $_POST['blocNote'];
            $addBlock->addBlock();
        } else {
            $formErrors['blockError'] = BLOCK_ERROR_TEXT;
        }
    }
}

$list = new block;
$viewListBlock = $list->listBlock();


$delete = new block;
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_suppression"])) {
        $delete->id =$_POST["id_suppression"];
        $delete->deleteBlock();
    } else {
        $formErrors['deleteBlock'] = BLOCK_ERROR_DELETE;
    }


require_once '../views/includes/header.php';
require_once '../views/desk.php';
require_once '../views/includes/footer.php';
