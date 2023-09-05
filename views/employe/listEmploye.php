<!-- Conteneur principal -->
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
            <tbody>
                <?php foreach ($list as $list) { ?>
                    <tr>
                        <td><?= $list->lastname ?></td>
                        <td><?= $list->firstname ?></td>
                        <td><?= $list->email ?></td>
                        <td><?= $list->phone ?></td>

                        <td class="border" id="modalInfo" style="width: 100px;">
                            <a href="/Liste-Employer-<?= $list->id ?>"><button class="infoEmployee" title="fiche d'information"><i class="fas fa-eye"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <a href="/Modifier-Employer-<?= $list->id ?>"><button title="modifier la fiche"><i class="fas fa-edit"></i></button></a>
                        </td>
                        <td class="border" style="width: 100px;">
                            <form action="/Liste-Employer" id="deleteForm" method="POST">
                                <input type="hidden" name="id_suppression" value="<?= $list->id ?>">
                                <button type="submit" id="hoverDanger" name="delete" title="suppression de la fiche"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Bouton pour créer un nouveau profil -->
    <button onclick="openModal()" class="create-profile-button"> <a href="/Ajout-Employer">Créer un nouveau profil</a></button>

    <!--MODAL BUTTON-->
    <div id="employeeModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>FICHE DE RENSEIGNEMENT</h2>
            <div class="infoItem">
                <strong>Nom:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Prénom:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Mail:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Date de naissance:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Adresse:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Téléphone:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Type de contrat:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Date de début:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Date de fin:</strong>
                <span></span>
            </div>
            <div class="infoItem">
                <strong>Numéro de sécurité sociale:</strong>
                <span></span>
            </div>
        </div>
        <button id="closeModalButton">Fermer</button>
    </div>
</div>
<script src="assets/js/employees.js"></script>