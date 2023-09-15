<div class="displayTable">
    <h1>Liste des client(e)s</h1>
    <div class="tableContainer">
        <table id="clientsTable" class="responsiveTable">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Nom du contact</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th class="border" id="modalInfo" title="fiche d'information"><i class="fas fa-eye"></i></th>
                    <th class="border"><i class="fas fa-edit" title="modifier la fiche"></i></th>
                    <th class="border"><i class="fas fa-trash-alt" title="suppression de la fiche"></i></th>
                </tr>
            </thead>
            <tbody class="liveList">
                <?php foreach ($listCustomer as $u) { ?>
                    <tr>
                        <td class="fixedWidthColumn"><?= $u->name ?></td>
                        <td class="fixedWidthColumn"><?= $u->contactName ?></td>
                        <td class="fixedWidthColumn"><?= $u->phone ?></td>
                        <td class="fixedWidthColumn"><?= $u->email ?></td>
                        <td class="border" id="modalInfo">
                            <button type="button" name="info" class="infoCustomer" id="infoCustomer" title="fiche d'information" data-id="<?= $u->id ?>" onclick="displayCustomer(this)"><i class="fas fa-eye"></i></button>
                        </td>
                        <td class="border">
                            <a class="editCustomerButton" href="./Modifier-Client-<?= $u->id ?>"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>
                        </td>
                        <td class="border">
                            <button type="button" id="hoverDanger" name="deleteCustomer" title="suppression de la fiche" data-id="<?= $u->id ?>" onclick="deleteCustomerById(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- boutton pour ajoute un nouvelle client -->
    <button onclick="openModal()" class="create-profile-button"><a href="./Ajout-Client">Créer un nouveau profil</a></button>
    <!--
        ici la model pour plus d info
    -->
    <div id="displayModal" class="modal">
        <h2>FICHE DE RENSEIGNEMENT</h2>
        <!--
            les information son injecter via l'ajax
        -->
        <div class="modalContent" id="modalContent"></div>
        <div class="buttonModal">
            <button type"submit" id="downloadButton"><i class="fas fa-download" title="télécharger la fiche"></i></button>
            <button id="closeModalButton">Fermer</button>
        </div>
    </div>

    <div id="confirmDeleteModal" class="modal">
        <h2>Confirmation de Suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
        <button id="confirmDelete">Confirmer</button>
        <button id="cancelDeleteModalButton">Annuler</button>
    </div>
</div>
<script src="assets/js/clients.js"></script>