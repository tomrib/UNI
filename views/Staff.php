<div class="container">
    <div class="displayStaff">
        <h1>Bonjour </h1>
        <label for="id_customers">Où êtes-vous ?</label>
        <select name="id_customers" id="id_customers">
            <option selected disabled>---</option>
            <?php foreach ($listName as $customer) { ?>
                <option value="<?= $customer->id ?>"><?= $customer->name ?></option>
            <?php } ?>
        </select>
        <p class="errors"><?= @$formErrors['id_customers'] ?></p>
        <input type="hidden" value="<?= $todayDate->id ?>" name="id_date" id="id_date">
        <div class="displayBtmTime">
            <button name="arrivalButton" id="arrivalButton" class="timeButtons" action="arrival">Je suis sur place !</button>
            <button name="endButton" id="endButton" class="timeButtons" action="end">Fin d'intervention</button>
        </div>
        <div class="upload">
            <h2>Faire un signalement</h2>
            <button id="openUploadModal">Continuer</button>
        </div>
        <a id="exitButton1" href="./Deconnecter"><button><i class="fas fa-door-open"></i> Exit</button></a>
    </div>
</div>
<div id="myModalArrival" class="modalArrival">
    <p id="arrivalMessage"></p>
    <button id="arrivalCloseButton">Fermer</button>
</div>
<form method="POST" id="myModalUpload" class="modalUpload" enctype="multipart/form-data">
    <h2>SIGNALEMENT</h2>
    <div class="dateReporting">
        <p>Nous sommes le <?= $todayDate->date ?></p>
    </div>
    <div class="select">
        <div>
            <p>Lieu du signalement:</p>
            <select id="id_customer" name="id_customer">
                <option selected disabled value="">---</option>
                <?php foreach ($listName as $customer) { ?>
                    <option value="<?= $customer->id ?>"><?= $customer->name ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <p>Heure de l'événement:</p>
            <input type="time" id="time" name="timeIntervention">
        </div>
        <div>
            <p>Type d'événement:</p>
            <select id="id_typesInterventions" name="id_typesInterventions">
                <option selected disabled>---</option>
                <?php foreach ($listTypesInterventions as $e) { ?>
                    <option value="<?= $e->id ?>"><?= $e->name ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <p>Votre message:</p>
    <textarea rows="8" id="text" name="textIntervention"></textarea>
    <p>Envoyé un fichier:</p>
    <button id="uploadButtonTest">UPLOAD</button>
    <input type="file" name="imgIntervention" id="fileUpload" multiple />
    <p id="fileCountText"></p>
    <div id="errorMessages" class="error">
        <p><?= @$formErrors['textIntervention'] ?></p>
        <p><?= @$formErrors['timeIntervention'] ?></p>
        <p><?= @$formErrors['id_customer'] ?></p>
        <p><?= @$formErrors['id_typesInterventions'] ?></p>
        <p><?= @$formErrors['date'] ?></p>
        <p><?= @$formErrors['img'] ?></p>
    </div>
    <button id="UploadCloseButton">ANNULER</button>
    <button id="sendButton">VALIDER</button>
    <div id="confirmationModal" class="modal">
        <div>
            <p>Êtes-vous sûr de vouloir valider votre signalement ?</p>
            <div class="positionButton">
                <button id="confirmNoButton" class="closeButton">Non</button>
                <button type="submit" id="confirmYesButton" name="btnIntervention" class="closeButton">Oui</button>
            </div>
        </div>
    </div>
</form>
<script src="assets/js/staff.js"></script>