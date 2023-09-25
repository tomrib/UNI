<div class="displayDesk">
    <div class="arrangementDesk">
        <div class="displayLive">
            <h1>Bloc Note</h1>
            <div class="liveList">
                <?php foreach ($list as $e) { ?>
                    <div class="newsItem">
                        <p>Écrit par : <?= $e->firstname ?></p>
                        <p><?= $e->text ?></p>
                        <p>Fais le : <?= $e->date ?> à <?= $e->timer ?></p>
                        <button type="button" id="hoverDanger" class="deleteNote" title="suppression de la fiche" data-id="<?= $e->idNote ?>"><i class="fas fa-trash-alt"></i></button>
                        <hr>
                        <br>
                    </div>
                <?php } ?>
            </div>
        </div>
        <form action="./Bureau" method="POST" id="bckNote" class="displayNote">
            <h1>Ajouté une note</h1>
            <textarea wrap="hard" name="note" id="BN" rows="15"></textarea>
            <p class="errors"><?= @$formErrors['note'] ?></p>
            <button type="submit" name="btnBlockValidation">Valider</button>
        </form>
    </div>
    <div id="inter" class="displayIntervention">
        <h1>Intervention(s)</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cumque asperiores omnis alias nulla nobis rerum. Autem ipsum fugit velit adipisci officia quasi temporibus iure?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cumque asperiores omnis alias nulla nobis rerum. Autem ipsum fugit velit adipisci officia quasi temporibus iure?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cumque asperiores omnis alias nulla nobis rerum. Autem ipsum fugit velit adipisci officia quasi temporibus iure?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cumque asperiores omnis alias nulla nobis rerum. Autem ipsum fugit velit adipisci officia quasi temporibus iure?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore cumque asperiores omnis alias nulla nobis rerum. Autem ipsum fugit velit adipisci officia quasi temporibus iure?</p>
    </div>
</div>
<script src="assets/js/desk.js"></script>