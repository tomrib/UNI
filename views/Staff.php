<?php require_once "../controllers/staffController.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Espace de </title>
</head>

<body>
    <div class="container">
        <div class="displayStaff">
            <h1>Bonjour </h1>
            <button id="arrivalButton" >Je suis sur place !</button>
            <button id="endButton">Fin d'intervention</button>
            <div class="upload">
                <h2>Faire un signalement</h2>
                <button id="openUploadModal">Continuer</button>
            </div>
        </div>
    </div>
    <div id="myModalArrival" class="modalArrival">
        <p id="arrivalMessage"></p>
        <button id="arrivalCloseButton">Fermer</button>
    </div>
    <div id="myModalDepart" class="modalDepart">
        <p id="endMessage"></p>
        <button id="endCloseButton">Fermer</button>
    </div>
    <form id="myModalUpload" class="modalUpload">
        <h2>SIGNALEMENT</h2>
        <div>
            <p>Le 17/10/2023 </p>
        </div>
        <div class="select">
            <div>
                <p>Lieu du signalement:</p>
                <select>
                    <option selected disabled value="option1">---</option>
                    <option value="option2">Bateau</option>
                    <option value="option3">sur</option>
                    <option value="option4">l'eau</option>
                    <option value="option5">E</option>
                    <option value="option6">F</option>
                    <option value="option7">G</option>
                    <option value="option8">H</option>
                    <option value="option9">I</option>
                </select>
            </div>
            <div>
                <p>Heure de l'événement:</p>
                <input type="time">
            </div>
            <div>
                <p>Type d'événement:</p>
                <select>
                    <option selected disabled>---</option>
                    <?php foreach ($listTypesInterventions as $e) { ?>
                        <option value="<?= $e->id ?>"><?= $e->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <p>Votre message:</p>
        <textarea rows="8"></textarea>

        <p>Envoyé un fichier:</p>
        <button id="uploadButtonTest">UPLOAD</button>
        <input type="file" id="fileUpload" accept="image/*">
        <p id="fileCountText"></p>
        <button id="UploadCloseButton">ANNULER</button>
        <button type="submit" id="sendButton">VALIDER</button>
    </form>
    <script src="assets/js/staff.js"></script>
</body>

</html>