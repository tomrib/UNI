<div class="displayDesk">
    <form class="displayCalendar">
        <h1>Agenda</h1>
        <div class="calendar-header">
            <span class="prev-month">&lt;</span>
            <span class="current-month">Month Year</span>
            <div class="clock">Horloge</div>
            <span class="next-month">&gt;</span>
        </div>
        <div class="calendar-body">
            <div class="weekdays">
                <span>Dim</span>
                <span>Lun</span>
                <span>Mar</span>
                <span>Mer</span>
                <span>Jeu</span>
                <span>Ven</span>
                <span>Sam</span>
            </div>
        </div>
        <div class="days">
            <!-- Les jours du calendrier seront générés dynamiquement ici -->
        </div>
    </form>
    <form method="POST" id="bckNote" class="displayNote">
        <h1>Bloc Note</h1>
        <textarea wrap="hard" name="blocNote" id="BN" cols="60" rows="15"></textarea>
        <button type="submit" name="btnBlockValidation">Valider</button>
    </form>
    <form method="POST" id="inter" class="displayIntervention">
        <h1>Intervention(s)</h1>
        <textarea wrap="hard" name="intervention" id="BN" cols="60" rows="15"></textarea>
        <button type="submit" name="btnBlockValidation">Valider</button>
    </form>
    <form class="displayLive">
        <h1>Actualité(s) en direct</h1>
        <p class="empty-message">Aucune actualité pour le moment.</p>
        <div class="news-list">
            <?php foreach ($viewListBlock as $listBlock) { ?>
                <div id="btnSup">
                    <p><?= $listBlock->text ?></p>
                    <form method="post">
                        <input type="hidden" name="id_suppression" value="<?= $listBlock->id ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                </div>
            <?php }  ?>
        </div>
    </form>
</div>
<script src="assets/js/clockCalendar.js"></script>