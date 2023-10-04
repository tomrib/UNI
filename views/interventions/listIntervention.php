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
                    <th class="border"><i class="fas fa-add" title="rajouter un sous-traitant"></i></th>
                    <th class="border" id="modalInfo" title="fiche d'information"><i class="fas fa-eye"></i></th>
                    <th class="border"><i class="fas fa-edit" title="modifier une intervention"></i></th>
                    <th class="border"><i class="fas fa-trash-alt" title="suppression de la fiche"></i></th>
                </tr>
            </thead>
            <tbody class="interventionsList">
            <tbody class="interventionsList">
                <?php foreach ($list as $l) { ?>
                    <tr>
                        <td><?= $l->reportingDate ?></td>
                        <td><?= $l->name  ?></td>
                        <td><?= $l->address  ?></td>
                        <td><?= $l->text  ?></td>
                        <td class="border">
                            <button type="button" name="addSubcontractor" class="addSubcontractor" id="addSubcontractor" title="rajouter un sous-traitant" data-id="<?= $l->id ?>"><i class="fas fa-add"></i></button>
                        </td>
                        <td class="border">
                            <button type="button" name="viewIntervention" class="viewIntervention" id="viewIntervention" title="voir l'intervention" data-id="<?= $l->id ?>"><i class="fas fa-eye"></i></button>
                        </td>
                        <td class="border">
                            <a href="./Modifier-Intervention"><button type="button" name="updateIntervention" class="updateIntervention" id="updateIntervention" title="modifier l'intervention" data-id="<?= $l->id ?>"><i class="fas fa-edit"></i></a></button>
                        </td>
                        <td class="border">
                            <button type="button" name="deleteIntervention" class="deleteIntervention" id="hoverDanger" title="supprimer l'intervention" data-id="<?= $l->id ?>"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <button onclick="openModal()" class="createProfileButton"><a href="./Ajout-Intervention">Créer une nouvelle intervention</a></button>
</div>

<!--MODAL de la page-->
<!-- MODAL Fiche d'intervention -->
<div id="infoIntervention" class="modal">
    <h2>FICHE D'INTERVENTION</h2>
    <hr>
    <p class="strongP">Date de création: </p>
    <p class="strongP">Créer par: </p>
    <p class="strongP">Type d'intervention: </p>
    <p class="strongP">Date de l'intervention: </p>
    <p class="strongP">Adresse de l'intervention: </p>
    <p class="strongP">Intervenant: </p>
    <div class="borderComment">
        <p class="strongP">Commentaire</p>
        <p></p>
    </div>
    <div>
        <button id="viewPhotoButton">Voir les pièces jointes</button>
    </div>
    <hr>
    <div>
        <button id="closeInfoInterventionButton">Fermer</button>
    </div>
</div>
<!-- MODAL du carrousel des pièces jointes -->
<div id="photoCarouselModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="imageCarousel" class="carousel">
            <div class="carousel-slide">
                <img src="" alt="" width="35%">
            </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL de confirmation de supression -->
<div id="confirmDeleteIntervention" class="modal">
    <h2>Confirmation de Suppression</h2>
    <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
    <div class="displayButtonUpdate">
        <button id="confirmDelete">Confirmer</button>
        <button id="cancelDeleteModalButton">Annuler</button>
    </div>
</div>

<!-- MODAL rajout d'un intervenant-->
<div id="addIntervenant" class="modal">
    <h2>Liste des intervenants disponibles</h2>
    <label for="date">Date:</label>
    <input type="date" id="dateIntervenant" name="dateIntervenant" value="">

    <label for="time">Heure:</label>
    <input type="time" id="timeIntervenant" name="timeIntervenant" value="">

    <select>
        <option selected disabled value="option1">intervenants</option>
        <option value="option2"></option>

    </select>
    <div class="displayButtonUpdate">
        <button id="confirmAddIntervenant">Confirmer</button>
        <button id="cancelAddIntervenant">Annuler</button>
    </div>
</div>

<script src="assets/js/addIntervention.js"></script>