<link rel="stylesheet" href="../assets/css/style.css">
<div id="updateForm">
    <form id="profileForm" method="POST">
        <h3>Modification d'un profil employé(e)</h3>
        <label for="lastname">Nom:</label>
        <input type="text" id="lastname" name="lastname" value="" placeholder="Nom de l'employé(e)...">
        <p class="errors"><?= @$formErrors['lastname'] ?></p>
        <label for="firstname">Prénom:</label>
        <input type="text" id="firstname" name="firstname" value="" placeholder="Prénom de l'employé(e)...">
        <p class="errors"><?= @$formErrors['firstname'] ?></p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" placeholder="Email de l'employé(e)...">
        <p class="errors"><?= @$formErrors['email'] ?></p>
        <label for="address">Adresse:</label>
        <input type="text" id="address" name="address" value="" placeholder="Adresse de l'employé(e)...">
        <p class="errors"><?= @$formErrors['address'] ?></p>
        <label for="phone">Téléphone:</label>
        <input type="tel" id="phone" name="phone" value="" placeholder="Téléphone de l'employé(e)...">
        <p class="errors"><?= @$formErrors['phone'] ?></p>
        <label for="contra">Type Contrat:</label>
        <input type="text" id="contra" title="CDI, CDD, Intérim, Temps partiel, Extra" name="contra" value="" placeholder="CDI, CDD, Intérim, Temps partiel, Extra...">
        <p class="errors"><?= @$formErrors['contra'] ?></p>
        <label for="cq">N° Sécu:</label>
        <input type="text" id="cq" name="cq" value="" placeholder="Numéro de sécurité sociale de l'employé(e)...">
        <p class="errors"><?= @$formErrors['cq'] ?></p>
        <button name="validationEmployees" id="validationUpdate" type="submit">Modifier</button>
        <button id="closeUpdateEmployes" onclick="closeModal()">Annuler</button>
    </form>
</div>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p id="confirmationMessage">Êtes-vous sûr(e) de vouloir modifier ?</p>
        <div class="modal-buttons">
            <button id="confirmUpdate">Oui</button>
            <button id="cancelUpdate">Non</button>
        </div>
    </div>
</div>

<script src="../assets/js/update.js"></script>