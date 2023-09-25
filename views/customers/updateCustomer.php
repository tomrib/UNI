<div class="displayForm">
    <div id="updateForm">
        <form  id="profileForm" method="POST">
            <h1>Modification d'un profil client(e)</h1>
            <label for="name">Nom de l'entreprise</label>
            <input type="text" id="name" name="name" placeholder="Nom de l'entreprise" value="<?= $listCustomerOne->name ?>">
            <p class="errors"><?= @$formErrors['name'] ?></p>
            <label for="contactName">Nom du contact</label>
            <input type="text" id="contactName" name="contactName" placeholder="Nom du contact..." value="<?= $listCustomerOne->contactName  ?>">
            <p class="errors"><?= @$formErrors['contactName'] ?></p>
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" placeholder="Adresse de l'entreprise" value="<?= $listCustomerOne->address  ?>">
            <p class="errors"><?= @$formErrors['address'] ?></p>
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="Téléphone de l'entreprise" value="<?= $listCustomerOne->phone  ?>">
            <p class="errors"><?= @$formErrors['phone'] ?></p>
            <label for="email">Mail</label>
            <input type="email" id="email" name="email" placeholder="Email de l'entreprise" value="<?= $listCustomerOne->email  ?>" ">
            <p class=" errors"><?= @$formErrors['email'] ?></p>
            <button name="validationCustomers" id="validationUpdate">Modifier</button>
            <button id="closeUpdateCustomers">Annuler</button>
            <div id="confirmationModalUpdate" class="modalUpdate">
                <div class="modalContent">
                    <p id="confirmationMessage">Êtes-vous sûr(e) de vouloir modifier ?</p>
                    <div class="modalButtons">
                        <button type="submit" id="confirmUpdate">Oui</button>
                        <button id="cancelUpdate">Non</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/updateClients.js"></script>