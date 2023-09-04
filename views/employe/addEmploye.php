<div class="displayForm">
    <form class="addEmploye" id="profileForm" method="POST">
        <!-- Titre de la modal -->
        <h2>Créer un Nouveau Profil</h2>
        <!-- Champs pour saisir les informations de l'employé(e) -->
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" placeholder="Nom de l'employé(e)...">
        <p class="errors"><?= @$formErrors['lastname'] ?></p>
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" placeholder="Prénom de l'employé(e)...">
        <p class="errors"><?= @$formErrors['firstname'] ?></p>
        <label for="birthday">Date de naissance</label>
        <input type="date" id="birthday" name="birthday" placeholder="date de naissance...">
        <!--Faire le rajout de l'erreur en PHP-->
        <p class="errors"><?= @$formErrors['birthday'] ?></p>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email de l'employé(e)...">
        <p class="errors"><?= @$formErrors['email'] ?></p>
        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" placeholder="Adresse de l'employé(e)...">
        <p class="errors"><?= @$formErrors['address'] ?></p>
        <label for="phone">Téléphone</label>
        <input type="text" id="phone" name="phone" placeholder="Téléphone de l'employé(e)..." inputmode="numeric" title="Veuillez entrer un numéro de téléphone à 10 chiffres." maxlength="10" pattern="[0-9]{10}" required>

        <p class="errors"><?= @$formErrors['phone'] ?></p>
        <label for="cq">N° Sécu</label>
        <input type="text" id="cq" name="cq" placeholder="Numéro de sécurité sociale de l'employé(e)...">
        <p class="errors"><?= @$formErrors['cq'] ?></p>
        <!--DEBUT MODIF-->
        <label for="password">Mot de passe</label>
        <div class="eye">
            <input type="password" id="password" name="password" placeholder="Mot de passe de l'employé(e)...">
            <button type="button" id="showPassword" class="passwordToggleBtn">
                <i class="far fa-eye-slash"></i>
            </button>
        </div>
        <p class="errors"><?= @$formErrors['password'] ?></p>
        <label class="typeContrat" for="contra">Type Contrat</label>
        <select type="text" id="contra" name="contra">
            <option selected disabled value="0">---</option>
            <?php foreach ($contra as $liste) { ?>
                <option value="<?= $liste->id ?>"><?= $liste->name ?></option>
            <?php } ?>
        </select>

        <!-- Insérez les champs de sélection de date ici -->
        <div id="dateFields"></div>

        <div id="password-info-box" class="passwordInfoBox" style="display: none;">
            <ul>
                <li class="password-condition lower">Au moins 1 minuscule<span></span></li>
                <li class="password-condition upper">Au moins 1 majuscule<span></span></li>
                <li class="password-condition number">Au moins 1 chiffre<span></span></li>
                <li class="password-condition special">Au moins un caractère spécial<span></span></li>
                <li class="password-condition stringLength">Au moins 8 caractères<span></span></li>
            </ul>
        </div>




        <div> <button name="validationEmployees" id="validationEmployees" type="submit">Créer</button></div>
    </form>
</div>
<!-- Boutons pour supprimer et modifier un profil, masqués par défaut -->
<button id="deleteProfileButton" style="display: none;">Supprimer</button>
<button id="editProfileButton" style="display: none;">Modifier</button>
<!-- Bouton pour fermer la modal -->

<button id="closeModalButton" onclick="closeModal()">Fermer</button>

<script src="assets/js/employees.js"></script>
<script src="assets/js/timeContract.js"></script>