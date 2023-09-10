    <div class="displayTable">
        <h1>Liste des Employé(e)s</h1>
        <div class="tableContainer">
            <table id="employeesTable" class="responsiveTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th class="border" id="modalInfo" title="fiche d'information"><i class="fas fa-eye"></i></th>
                        <th class="border"><i class="fas fa-edit" title="modifier la fiche"></i></th>
                        <th class="border"><i class="fas fa-trash-alt" title="suppression de la fiche"></i></th>
                    </tr>
                </thead>
                <tbody class="liveList">
                    <?php foreach ($list as $list) { ?>
                        <tr>
                            <td class="fixedWidthColumn"><?= $list->lastname ?></td>
                            <td class="fixedWidthColumn"><?= $list->firstname ?></td>
                            <td class="fixedWidthColumn"><?= $list->email ?></td>
                            <td class="fixedWidthColumn"><?= $list->phone ?></td>
                            <td class="border" id="modalInfo">
                                <form id="deleteForm" method="POST">
                                    <input type="hidden" name="id_Info" value="<?= $list->id ?>">
                                    <button type="button" name="info" class="infoEmployee" title="fiche d'information" data-id="<?= $list->id ?>"><i class="fas fa-eye"></i></button>
                                </form>
                            </td>
                            <td class="border">
                                <a class="editEmployeeButton" href="./Modifier-Employer-<?= $list->id ?>"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>
                            </td>
                            <td class="border">
                                <button type="button" id="hoverDanger" class="deleteEmployee" title="suppression de la fiche"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <div id="confirmDeleteModal" class="modal" style="display: none;">
                            <h2>Confirmation de Suppression</h2>
                            <p>Êtes-vous sûr de vouloir supprimer cette fiche ?</p>
                            <form action="./Liste-Employer" id="deleteForm" method="POST">
                                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                                <button class="deleteEmployee" id="confirmDeleteModalButton" type="submit" name="delete">Confirmer</button>
                                <button id="cancelDeleteModalButton">Annuler</button>
                            </form>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <button onclick="openModal()" class="create-profile-button"><a href="./Ajout-Employer">Créer un nouveau profil</a></button>
        <div id="displayModal" class="modal" style="display: none;">
            <h2>FICHE DE RENSEIGNEMENT</h2>
            <?php foreach ($employeeData as $value) { ?>
                <div class="modalContent">
                    <div class="infoItem">
                        <p class="strongP">Nom:</p>
                        <p><?= $value->lastname ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Prénom:</p>
                        <p><?= $value->firstname ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Mail:</p>
                        <p><?= $value->email  ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Date de naissance:</p>
                        <p><?= $value->birthday ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Adresse:</p>
                        <p><?= $value->address ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Téléphone:</p>
                        <p><?= $value->phone ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Type de contrat:</p>
                        <p><?= $value->contra ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Date de début:</p>
                        <p><?= $value->beginningContract ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Date de fin:</p>
                        <p><?= $value->endContract ?></p>
                    </div>
                    <div class="infoItem">
                        <p class="strongP">Numéro de sécurité sociale:</p>
                        <p><?= $value->socialInsuranceNumber ?></p>
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
            <form action="./Liste-Employer" id="deleteForm" method="POST">
                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                <button id="confirmDeleteModalButton">Confirmer</button>
                <button id="cancelDeleteModalButton">Annuler</button>
            </form>
        </div>
    </div>

    <script src="assets/js/employees.js"></script>