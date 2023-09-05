<div id="updateForm">
    <?php foreach ($userIdOne as  $userIdOne) { ?>
        <form action="./Modifier-Employer-<?= $userIdOne->id ?>" id="profileForm" method="POST">
            <h1>Modification d'un profil employé(e)</h1>

            <label for="typeUser">Types de postes:</label>
            <select type="text" id="typeUser" name="typeUser">
                <option value="<?= $userIdOne->usersTypeId ?>"><?= $userIdOne->usersType ?></option>
                <?php foreach ($listTypeUser as $listUser) { ?>
                    <option value="<?= $listUser->id ?>"><?= $listUser->name ?></option>
                <?php } ?>
            </select>
            <p class="errors"><?= @$formErrors['typeUser'] ?></p>

            <label for="lastname">Nom:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $userIdOne->lastname ?>">
            <p class="errors"><?= @$formErrors['lastname'] ?></p>

            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $userIdOne->firstname ?>">
            <p class="errors"><?= @$formErrors['firstname'] ?></p>

            <label for="birthday">Date de naissance</label>
            <input type="date" id="birthday" name="birthday" value="<?= $userIdOne->birthday ?>" placeholder="date de naissance...">
            <p class="errors"><?= @$formErrors['birthday'] ?></p>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $userIdOne->email ?>">
            <p class="errors"><?= @$formErrors['email'] ?></p>

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" value="<?= $userIdOne->address ?>">
            <p class="errors"><?= @$formErrors['address'] ?></p>

            <label for="phone">Téléphone:</label>
            <input type="tel" id="phone" name="phone" class="input-telephone" value="<?= $userIdOne->phone ?>">
            <p class="errors"><?= @$formErrors['phone'] ?></p>

            <label for="contra">Type Contrat:</label>
            <select type="text" id="contra" name="contra">
                <option value="<?= $userIdOne->contraId ?>"><?= $userIdOne->contra ?></option>
                <?php foreach ($contra as $liste) { ?>
                    <option value="<?= $liste->id ?>"><?= $liste->name ?></option>
                <?php } ?>
            </select>


            <label for="beginningContract">Date de début :</label>
            <input type="date" id="beginningContract" value="<?= $userIdOne->beginningContract ?>" name="beginningContract" required>
            <label for="endContract">Date de fin :</label>
            <input type="date" id="endContract" value="<?= $userIdOne->endContract ?>" name="endContract" required>


            <label for="socialInsuranceNumber">N° Sécu:</label>
            <input type="text" id="cq" name="socialInsuranceNumber" value="<?= $userIdOne->socialInsuranceNumber ?>">
            <p class="errors"><?= @$formErrors['socialInsuranceNumber'] ?></p>

            <button name="validationEmployees" id="validationUpdate" type="submit">Modifier</button>
            <button id="closeUpdateEmployes" onclick="closeModal()">Annuler</button>
        <?php } ?>
        <div id="confirmationModal" class="modal">
            <div class="modal-content">
                <p id="confirmationMessage">Êtes-vous sûr(e) de vouloir modifier ?</p>
                <div class="modal-buttons">
                    <input type="submit" id="confirmUpdate" value="Oui">
                    <button id="cancelUpdate">Non</button>
                </div>
            </div>
        </div>
        </form>
</div>

<script src="assets/js/timeContract.js"></script>
<script src="assets/js/update.js"></script>