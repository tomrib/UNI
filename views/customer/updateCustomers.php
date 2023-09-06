<link rel="stylesheet" href="../../assets/css/style.css">
<div id="updateForm">
    <form id="profileForm" method="POST">
        <?php foreach ($listCustomerOne  as $one) { ?>
            <h3>Modification d'un profil client(e)</h3>
            <label for="name">Nom de l'entreprise:</label>
            <input type="text" id="name" name="name" placeholder="Nom de l'entreprise" value="<?= $one->name ?>">
            <p class="errors"><?= @$formErrors['name'] ?></p>
            <label for="contactName">Nom du contact:</label>
            <input type="text" id="contactName" name="contactName" placeholder="Nom du contact..." value="<?= $one->contactName  ?>">
            <p class="errors"><?= @$formErrors['contactName'] ?></p>
            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" placeholder="Adresse de l'entreprise" value="<?= $one->address  ?>">
            <p class="errors"><?= @$formErrors['address'] ?></p>
            <label for="phone">Téléphone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Téléphone de l'entreprise" value="<?= $one->phone  ?>">
            <p class="errors"><?= @$formErrors['phone'] ?></p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email de l'entreprise" value="<?= $one->email  ?>" ">
            <p class=" errors"><?= @$formErrors['email'] ?></p>
            <button name="validationCustomers" id="validationUpdate" type="submit">Modifier</button>
            <button id="closeUpdateCustomers" onclick="closeModal()">Annuler</button>
        <?php } ?>
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

<script src="../../assets/js/update.js"></script>