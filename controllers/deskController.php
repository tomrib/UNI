<?php
session_start();
require_once '../models/notesModel.php';
require_once '../models/userModel.php';
require_once '../confi.php';
$formErrors = [];
if ($_SESSION['user']['id_usersTypes'] == '1') {
    header('location:./Deconnecter');
    exit;
}
if ($_SESSION['user'] == '') {
    header('location:./Connexion');
    exit;
}

if (count($_POST) > 0) {
    $note = new note;
    if (!empty($_POST['note'])) {
        if (!preg_match($regex['content'], $_POST['note'])) {
            $note->text = strip_tags($_POST['note']);
        } else {
            $formErrors['note'] = BLOCK_ERROR_TEXT;
        }
    } else {
        $formErrors['note'] = BLOCK_ERROR_TEXT_EMPTY;
    }

    if (!empty($_SESSION['user']['id'])) {
        $note->id_users = intval($_SESSION['user']['id']);
    } else {
        header('location:./Deconnecter');
    }

    if (count($formErrors) == 0) {
        $note->addNote();
    }
}

$newNote = new note;
$list = $newNote->listsNote();

require_once '../views/includes/header.php';
require_once '../views/desk.php';
require_once '../views/includes/footer.php';
