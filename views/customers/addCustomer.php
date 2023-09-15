<div class="displayForm">
    <form class="addClient" id="profileForm" method="POST">
        <h1>Ajout d'une entreprise</h1>
        <label for="name">Nom de l'entreprise</label>
        <input type="text" id="name" name="name" placeholder="Nom de l'entreprise" value="<?= @$_POST['name'] ?>" class="<?= isset($formErrors['name']) ? 'inputError' : '' ?>">
        <p class="errors"><?= @$formErrors['name'] ?></p>
        <label for="contactName">Nom du contact</label>
        <input type="text" id="contactName" name="contactName" placeholder="Nom du contact..." value="<?= @$_POST['contactName'] ?>" class="<?= isset($formErrors['contactName']) ? 'inputError' : '' ?>">
        <p class="errors"><?= @$formErrors['contactName'] ?></p>
        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" placeholder="Adresse de l'entreprise" value="<?= @$_POST['address'] ?>" class="<?= isset($formErrors['address']) ? 'inputError' : '' ?>">
        <p class="errors"><?= @$formErrors['address'] ?></p>
        <label for="phone">Téléphone</label>
        <input type="tel" id="phone" name="phone" placeholder="Téléphone de l'entreprise" value="<?= @$_POST['phone'] ?>" class="<?= isset($formErrors['phone']) ? 'inputError' : '' ?>">
        <p class="errors"><?= @$formErrors['phone'] ?></p>
        <label for="email">Mail</label>
        <input type="email" id="email" name="email" placeholder="Email de l'entreprise" value="<?= @$_POST['email'] ?>" class="<?= isset($formErrors['email']) ? 'inputError' : '' ?>">
        <p class="errors"><?= @$formErrors['email'] ?></p>
        <div>
            <button name="validationCustomers" id="validationUpdate" type="submit">Créer</button>
        </div>
    </form>
</div>
<script src="assets/js/addClients.js"></script>