<div class="displayForm">
    <form class="addIntervention" id="profileForm" method="POST">
        <h1>Ajout d'une intervention</h1>
        <label for="date">Date de la création</label>
        <input type="date" id="date" name="date">
        <p class="errors"><?= @$formErrors['date']?></p>
        <label for="timeIntervention">Heur de la création</label>
        <input type="time" id="timeIntervention" name="timeIntervention">
        <p class="errors"><?= @$formErrors['timeIntervention']?></p>
        <div class="displaySelect">
            <div>
                <p>Lieu de l'intervention:</p>
                <select name='id_customer'>
                    <option selected disabled value="option1">entreprise</option>
                    <?php foreach ($add as $a) { ?>
                        <option value="<?= $a->id ?>"><?= $a->address ?></option>
                    <?php } ?>
                </select>
                <p class="errors"><?= @$formErrors['id_customer']?></p>
            </div>
            <div>
                <p>Type d'intervention:</p>
                <select name="id_typesInterventions">
                    <option selected disabled value="option1">motif</option>
                    <?php foreach ($intervention as $e) { ?>
                        <option value="<?= $e->id ?>"><?= $e->name ?></option>
                    <?php } ?>
                </select>
                <p class="errors"><?= @$formErrors['id_typesInterventions']?></p>
            </div>
        </div>
        <p>Description de l'intervention:</p>
        <textarea rows="8" name="textIntervention"></textarea>
        <p class="errors"><?= @$formErrors['textIntervention']?></p>
        <div>
            <!--href inutile servant juste au test-->
            <button name="addIntervention" id="addIntervention" type="submit">Rajouter une intervention</button>
        </div>
    </form>
</div>
<script src="assets/js/intervention.js"></script>