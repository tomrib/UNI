<main>
    <div class="left-column">
        <div class="main-block">
            <div class="calendar">
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
            </div>
        </div>
        <div class="main-block">
            <form method="POST" id="bckNote" class="note">
                <p>Bloc Note</p>
                <textarea wrap="hard" name="blocNote" id="BN" cols="60" rows="15"></textarea>
                <button type="submit" name="btnBlockValidation">Valider</button>
            </form>
        </div>
    </div>
    <div class="note live-info" id="bckLive">
        <div class="right-column">
            <div class="main-block">
                <h3>Actualité(s) en direct</h3>
                <hr>
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
            </div>
        </div>
    </div>
</main>