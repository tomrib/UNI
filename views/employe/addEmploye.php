<link rel="stylesheet" href="../../assets/css/employees.css">

<!-- Titre de la modal -->
<h2>Créer un Nouveau Profil</h2>

<form id="profileForm" method="POST">
    <!-- Champs pour saisir les informations de l'employé(e) -->
    <label for="lastname">Nom:</label>
    <input type="text" id="lastname" name="lastname" placeholder="Nom de l'employé(e)...">
    <p class="errors"><?= @$formErrors['lastname'] ?></p>
    <label for="firstname">Prénom:</label>
    <input type="text" id="firstname" name="firstname" placeholder="Prénom de l'employé(e)...">
    <p class="errors"><?= @$formErrors['firstname'] ?></p>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email de l'employé(e)...">
    <p class="errors"><?= @$formErrors['email'] ?></p>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" placeholder="mot de passe de l'employé(e)...">
    <p class="errors"><?= @$formErrors['password'] ?></p>
    <div id="textPassWord" class="noBoxPass">
        <ul>
            <li id="lower">Au moin 1 minuscule<span></span><span></span></li>
            <li id="upper">Au moin 1 majuscule<span></span><span></span></li>
            <li id="number">Au moin 1 chiffre<span></span><span></span></li>
            <li id="special">Au moin un caractére spécial<span></span><span></span></li>
            <li id="stringLength">Au moin 8 caractéres<span></span><span></span></li>
        </ul>
    </div>
    <label for="address">Adresse:</label>
    <input type="text" id="address" name="address" placeholder="Adresse de l'employé(e)...">
    <p class="errors"><?= @$formErrors['address'] ?></p>
    <label for="phone">Téléphone:</label>
    <input type="tel" id="phone" name="phone" placeholder="Téléphone de l'employé(e)...">
    <p class="errors"><?= @$formErrors['phone'] ?></p>
    <label for="contra">Type Contrat:</label>
    <!-- liste des contra -->
    <select type="text" id="contra" name="contra">
        <option selected disabled value="0">---</option>
        <?php foreach ($contra as $liste) { ?>
            <option value="<?= $liste->id ?>"><?= $liste->name ?></option>
        <?php } ?>
    </select>
    <div id="dateFields">
    </div>
    <p class="errors"><?= @$formErrors['contra'] ?></p>
    <label for="cq">N° Sécu:</label>
    <input type="text" id="socialInsuranceNumber" name="socialInsuranceNumber" placeholder="Numéro de sécurité sociale de l'employé(e)...">
    <p class="errors"><?= @$formErrors['socialInsuranceNumber'] ?></p>
    <button name="validationEmployees" id="validationEmployees" type="submit">Créer</button>
</form>
<script src="../../assets/js/employees.js"></script>
<script src="../../assets/js/timeContract.js"></script>