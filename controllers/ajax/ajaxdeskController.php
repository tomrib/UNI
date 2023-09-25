<?php
require_once '../../models/notesModel.php';

$deleteNote = new note;
if (isset($_GET['deleteid']) && $deleteNote->checkIfNotesExist('id') != 0) {
    $deleteNote->id = $_GET['deleteid'];
    if ($deleteNote->deleteNote()) {
        $results['status'] = true;
        $results['data'] = $deleteNote->listsNote();
    } else {
        $results['status'] = false;
    }
    echo json_encode($results);
} 