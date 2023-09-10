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
                <?php foreach ($list as $list) { ?>
                    <tr>
                        <td class="fixedWidthColumn"><?= $list->name ?></td>
                        <td class="fixedWidthColumn"><?= $list->contactName ?></td>
                        <td class="fixedWidthColumn"><?= $list->phone ?></td>
                        <td class="fixedWidthColumn"><?= $list->email ?></td>
                        <td class="border" id="modalInfo" style="width: 100px;">
                            <a href="./Liste-Client-<?= $list->id ?>"><button class="infoClient" title="fiche d'information"><i class="fas fa-eye"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <a href="./Modifier-Client-<?= $list->id ?>"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <form action="./Liste-Client" id="deleteForm" method="POST">
                                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                                <button type="submit" id="hoverDanger" name="delete" title="suppression de la fiche"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    <div id="confirmDeleteModalButton" class="modal" style="display: none;">
                        <h2>Confirmation de Suppression</h2>
                        <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
                        <form action="./Liste-Client" id="deleteForm" method="POST">
                            <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                            <button class="deleteClient" id="confirmDeleteModalButton" type="submit" name="delete">Confirmer</button>
                            <button id="cancelDeleteModalButton">Annuler</button>
                        </form>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <button onclick="openModal()" class="create-profile-button"><a href="./Ajout-Client">Créer un nouveau profil</a></button>
    <div id="displayModal" class="modal" style="display: none;">
        <h2>FICHE DE RENSEIGNEMENT</h2>
        <?php foreach ($clientData as $value) { ?>
            <div class="modalContent">
                <div class="infoItem">
                    <p class="strongP">Nom de l'entreprise:</p>
                    <p><?= $value->name ?></p>
                </div>
                <div class="infoItem">
                    <p class="strongP">Contact:</p>
                    <p><?= $value->contactName ?></p>
                </div>
                <div class="infoItem">
                    <p class="strongP">Adresse:</p>
                    <p><?= $value->address  ?></p>
                </div>
                <div class="infoItem">
                    <p class="strongP">Téléphone:</p>
                    <p><?= $value->phone ?></p>
                </div>
                <div class="infoItem">
                    <p class="strongP">Mail:</p>
                    <p><?= $value->email ?></p>
                </div>
            </div>
            <div class="buttonModal">
                <button name="" id="downloadButton" type"submit"><i class="fas fa-download" title="télécharger la fiche"></i></button>
                <button id="closeModalButton">Fermer</button>
            </div>
        <?php } ?>
    </div>
    <div id="confirmDeleteModal" class="modal" style="display: none;">
        <h2>Confirmation de Suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
        <form action="./Liste-Client" id="deleteForm" method="POST">
            <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
            <button id="confirmDeleteModalButton">Confirmer</button>
            <button id="cancelDeleteModalButton">Annuler</button>
        </form>
    </div>
</div>
<script src="assets/js/clients.js"></script>