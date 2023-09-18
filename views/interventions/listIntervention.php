    <div class="displayTable">
        <h1>Liste des interventions</h1>
        <div class="tableContainer">
            <table id="interventionsTable" class="responsiveTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type intervention</th>
                        <th>Adresse</th>
                        <th>Commentaire</th>
                        <th class="border" id="modalInfo" title="fiche d'information"><i class="fas fa-eye"></i></th>
                        <th class="border"><i class="fas fa-add" title="rajouter un sous-traitant"></i></th>
                        <th class="border"><i class="fas fa-trash-alt" title="suppression de la fiche"></i></th>
                    </tr>
                </thead>
                <!-- For each à faire de ton coté-->
                <tbody class="interventionsList">
                </tbody>
            </table>
        </div>
        <div id="displayModal" class="modal">
            <h2>FICHE D'INTERVENTION
            </h2>
            <!--
            les information son injecter via l'ajax
        -->
            <div class="modalContent" id="modalContent"></div>
            <div class="buttonModal">
                <button id="closeModalButton">Fermer</button>
            </div>
        </div>
        <!-- ici modal de confirmation de supretion -->
        <div id="confirmDeleteModal" class="modal">
            <h2>Confirmation de Suppression</h2>
            <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
            <button id="confirmDelete">Confirmer</button>
            <button id="cancelDeleteModalButton">Annuler</button>
        </div>
    </div>
    <script src="assets/js/interventions.js"></script>