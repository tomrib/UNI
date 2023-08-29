<link rel="stylesheet" href="../../assets/css/style.css">
<div id="updateForm">
    <form id="profileForm" method="POST">
        <h3>Ajout d'une entreprise</h3>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="" placeholder="Nom de l'entreprise">
        <p class="errors"><?= @$formErrors['name'] ?></p>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="" placeholder="Nom du contact...">
        <p class="errors"><?= @$formErrors['contact'] ?></p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" placeholder="Email de l'entreprise">
        <p class="errors"><?= @$formErrors['email'] ?></p>
        <label for="address">Adresse:</label>
        <input type="text" id="address" name="address" value="" placeholder="Adresse de l'entreprise">
        <p class="errors"><?= @$formErrors['address'] ?></p>
        <label for="phone">Téléphone:</label>
        <input type="tel" id="phone" name="phone" value="" placeholder="Téléphone de l'entreprise">
        <p class="errors"><?= @$formErrors['phone'] ?></p>
        <label for="siret">Type Contrat:</label>
        <input type="text" id="siret" name="siret" value="" placeholder="Numéro SIRET de l'entreprise...">
        <p class="errors"><?= @$formErrors['siret'] ?></p>
        <button name="validationCustomers" id="validationUpdate" type="submit">Ajouter</button>
        <button id="closeUpdateCustomers" onclick="closeModal()">Annuler</button>
    </form>
</div>

