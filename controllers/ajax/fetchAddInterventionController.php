<?php
session_start();
require_once '../../models/imgInterventionModel.php';
require_once '../../models/interventionsModel.php';
require_once '../../confi.php';

// Créer une instance de la classe img
$add = new imginterventions;
$addIntervention = new interventions;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_SESSION['user']['id'])) {
        $addIntervention->id_users = $_SESSION['user']['id'];
    } else {
        header('Location: ./Connexion');
        exit;
    }
    if (!empty($_POST['textIntervention'])) {
        if (!preg_match($regex['content'], $_POST['textIntervention'])) {
            $addIntervention->text = strip_tags($_POST['textIntervention']);
        } else {
            echo BLOCK_ERROR_TEXT;
        }
    } else {
        echo INTERVENTION_ERREUR_EMPTY;
    }
    $date = date('Y-m-d');
    if (!empty($date)) {
        $addIntervention->reportingDate = $date;
    } else {
        echo ERREUR_ADMIN_INVALID;
    }
    if (!empty($_POST['timeIntervention'])) {
        if (preg_match($regex['time'], $_POST['timeIntervention'])) {
            $addIntervention->reportingTime = strip_tags($_POST['timeIntervention']);
        } else {
            echo INTERVENTION_ERREUR_TIME_INVALID;
        }
    } else {
        echo INTERVENTION_ERREUR_TIME_EMPTY;
    }
    if (!empty($_POST['id_customer'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_customer'])) {
            $addIntervention->id_customers = intval(strip_tags($_POST['id_customer']));
        } else {
            echo USER_CUSTOMER_ERROR_INVALID;
        }
    } else {
        echo USER_CUSTOMER_ERROR_EMPTY;
    }
    if (!empty($_POST['id_typesInterventions'])) {
        if (preg_match($regex['numberCustomer'], $_POST['id_typesInterventions'])) {
            $addIntervention->id_typesInterventions = intval(strip_tags($_POST['id_typesInterventions']));
        } else {
            echo USER_ERREUR_TYPEINTERVENTIO_INVALID;
        }
    } else {
        echo USER_ERREUR_TYPEINTERVENTIO_EMPTY;
    }


    // Parcourir les fichiers téléchargés (en supposant qu'il puisse y en avoir plusieurs)
    foreach ($_FILES as $file) {
        if (!empty($file)) {
            // Vérifier le code d'erreur pour déterminer le résultat du téléchargement
            switch ($file['error']) {
                case UPLOAD_ERR_OK:  // tout et ok 0
                    // Obtenir l'extension du fichier
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    // Vérifier si l'extension est autorisée
                    if (array_key_exists($extension, $mime_types) && mime_content_type($file['tmp_name']) == $mime_types[$extension]) {
                        // Définir le chemin de destination du fichier téléchargé
                        $path = 'assets/img/imgInter/' . uniqid() . '.' . $extension;
                        // Déplacer le fichier téléchargé vers le chemin de destination
                        if (move_uploaded_file($file['tmp_name'], '../../' . $path)) {
                            chmod('../../' . $path, '664');  // Correction des permissions
                            // Ajouter les informations sur le fichier à la base de données
                            echo $path;
                            try {
                                $add->img = $path;
                                $add->id_interventions = $addIntervention->addIntervention();
                                if ($add->addImgIntervention()) {
                                    echo 'Fichier téléchargé avec succès \n';
                                } else {
                                    unlink('../../' . $path);
                                    echo 'Erreur lors du traitement du fichier \n';
                                }
                            } catch (PDOException $e) {
                                unlink('../../' . $path);
                                echo  'Erreur lors du traitement du fichier \n';
                            }
                        } else {
                            echo 'Erreur lors du déplacement du fichier téléchargé. \n';
                        }
                    } else {
                        echo ' Extension de fichier non autorisée ou type MIME incorrect. ';
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE: //erreur 1
                    echo ' taille ';
                case UPLOAD_ERR_PARTIAL: //erreur 3
                    echo ' Le fichier n\'a été que partiellement téléchargé. \n';
                    break;
                case UPLOAD_ERR_NO_FILE: //erreur 4
                    echo ' Aucun fichier n\'a été téléchargé. \n';
                    break;
                default:
                    echo ' Une erreur inconnue s\'est produite. \n';
            }
        }
        $addIntervention->addIntervention();
    }
} else {
    echo 'Méthode non autorisée. \n';
}
