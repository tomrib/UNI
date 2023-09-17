<div class="displayDesk">
    <div class="arrangementDesk">
        <div class="displayLive">
            <h1>Actualité(s) en direct</h1>
            <div class="newsList">
                <div class="liveList">
                    <?php foreach ($list as $e) { ?>
                        <div class="newsItem">
                            <p>Écrit par : <?= $e->firstname ?></p>
                            <p><?= $e->text ?></p>
                            <p>Fais le : <?= $e->date ?> à <?= $e->timer ?></p>
                            <button type="button" id="hoverDanger" class="deleteNote" title="suppression de la fiche" data-id="<?= $e->idNote ?>"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <form method="POST" id="bckNote" class="displayNote">
            <h1>Bloc Note</h1>
            <textarea wrap="hard" name="note" id="BN" cols="60" rows="15"></textarea>
            <p class="errors"><?= @$formErrors['note'] ?></p>
            <button type="submit" name="btnBlockValidation">Valider</button>
        </form>
    </div>
    <div id="inter" class="displayIntervention">
        <h1>Intervention(s)</h1>
    </div>
</div>