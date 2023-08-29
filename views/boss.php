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
            <form method="POST" id="bckNote" class="note">Bloc Note<textarea wrap="hard" name="blocNote" id="BN" cols="60" rows="15"></textarea>
                <button type="submit" name="btnBlockValidation">Valider</button>
            </form>
        </div>
    </div>
    <div class="note live-info" id="bckLive">

        <div class="right-column">
            <div class="main-block">

                <h3>Actualité(s) en direct</h3>
                <hr>
                <div class="empty-message">Aucune actualité pour le moment.</div>
                <ul class="news-list">
                    <!-- Les actualités seront générées dynamiquement ici -->
                    <?php foreach ($viewListBlock as $listBlock) { ?>
                        <div id="btnSup">
                            <p><?= $listBlock->text ?></p>

                            <button>logo suppression</button>
                        </div>
                    <?php }  ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<script src="../assets/js/clockCalendar.js"></script>