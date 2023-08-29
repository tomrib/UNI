<?php
require_once '../models/userModel.php';
require_once '../models/blockModel.php';
require_once '../confi.php';
$formErrors = [];

$addBlock = new block;
if (!empty('validBlock')) {
    if (!empty($_POST['blocNote'])) {
        if (preg_match($regex['content'], $_POST['blocNote'])) {
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
if (!empty('delete')) {
    if (!empty($_GET['id'])) {
        $delete->id = $_GET['id'];
        $delete->deleteBlock();
    } else {
        $formErrors['deleteBlock'] = BLOCK_ERROR_DELETE;
    }
}

require_once '../views/includes/header.php';
require_once '../views/boss.php';
require_once '../views/includes/footer.php';
