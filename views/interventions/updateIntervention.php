<div class="displayForm">
    <div id="updateForm">
        <form id="profileForm" method="POST">
            <h1>Modification d'une intervention</h1>
            <div>
                <p>Type d'intervention:</p>
                <select>
                    <option selected disabled value="option1">---</option>
                    <option value="option2"></option>

                </select>
            </div>
            <p>Description de l'intervention:</p>
            <textarea rows="8"></textarea>
            <div>
                <p>Choix de l'intervenant:</p>
                <select>
                    <option selected disabled value="option1">---</option>
                    <?php foreach ($list as $l) { ?>
                        <option value="<?= $l->id ?>"><?= $l->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="date">Date:</label>
            <input type="date" id="dateIntervention" name="dateIntervention" value="">
            <p></p>
            <label for="birthday">Heure:</label>
            <input type="time" id="timeIntervention" name="timeIntervention" value="">
            <p></p>
            <div class="displayButtonUpdate">
                <button name="validationUpdateIntervention" id="validationUpdate">Modifier</button>
                <button id="closeUpdateIntervention"><a href="./Liste-Intervention">Annuler</a></button>
            </div>
            <div id="confirmationUpdateIntervention" class="modalUpdate">
                <div class="modalContent">
                    <p id="confirmationMessage">Êtes-vous sûr(e) de vouloir modifier ?</p>
                    <div class="modalButtons">
                        <button id="confirmUpdate" type="submit">Confirmer</button>
                        <button id="cancelUpdateIntervention">Annuler</button>
                    </div>
                </div>
        </form>
    </div>
</div>


<script src="assets/js/interventions.js"></script>