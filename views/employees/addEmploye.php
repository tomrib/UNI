<div class="displayForm">
        <form class="addEmploye" id="profileForm" method="POST">
                <h1>Créer un Nouveau Profil</h1>
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Nom de l'employé(e)..." value="<?= @$_POST['lastname'] ?>" class="<?= isset($formErrors['lastname']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['lastname'] ?></p>
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Prénom de l'employé(e)..." value="<?= @$_POST['firstname'] ?>" class="<?= isset($formErrors['firstname']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['firstname'] ?></p>
                <label for="birthday">Date de naissance</label>
                <input type="date" id="birthday" name="birthday" placeholder="date de naissance..." value="<?= @$_POST['birthday'] ?>" class="<?= isset($formErrors['birthday']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['birthday'] ?></p>
                <p class="errors"><?= @$formInformation['birthday'] ?></p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email de l'employé(e)..." value="<?= @$_POST['email'] ?>" class="<?= isset($formErrors['email']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['email'] ?></p>
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" placeholder="Adresse de l'employé(e)..." value="<?= @$_POST['address'] ?>" class="<?= isset($formErrors['address']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['address'] ?></p>
                <label for="phone">Téléphone</label>
                <input type="text" id="phone" name="phone" placeholder="Téléphone de l'employé(e)..." inputmode="numeric" title="Veuillez entrer un numéro de téléphone à 10 chiffres." value="<?= @$_POST['phone'] ?>" class="<?= isset($formErrors['phone']) ? 'inputError' : '' ?>" required>
                <p class="errors"><?= @$formErrors['phone'] ?></p>
                <label for="socialInsuranceNumber">N° Sécu</label>
                <input type="text" id="socialInsuranceNumber" name="socialInsuranceNumber" placeholder="Numéro de sécurité sociale de l'employé(e)..." value="<?= @$_POST['socialInsuranceNumber'] ?>" class="<?= isset($formErrors['socialInsuranceNumber']) ? 'inputError' : '' ?>">
                <p class="errors"><?= @$formErrors['socialInsuranceNumber'] ?></p>
                <label for="password">Mot de passe</label>
                <div class="eye">
                        <input type="password" id="password" name="password" placeholder="Mot de passe de l'employé(e)...">
                        <button type="button" id="showPassword" class="passwordToggleBtn">
                                <i class="far fa-eye-slash"></i>
                        </button>
                </div>
                <p class="errors"><?= @$formErrors['password'] ?></p>
                <div id="password-info-box" class="passwordInfoBox" style="display: none;">
                        <ul>
                                <li class="password-condition lower">Au moins 1 minuscule<span></span></li>
                                <li class="password-condition upper">Au moins 1 majuscule<span></span></li>
                                <li class="password-condition number">Au moins 1 chiffre<span></span></li>
                                <li class="password-condition special">Au moins un caractère spécial<span></span></li>
                                <li class="password-condition stringLength">Au moins 8 caractères<span></span></li>
                        </ul>
                </div>
                <label class="typeContrat" for="contract">Type Contrat</label>
                <select id="contract" name="contract">
                        <option value="<?= @$_POST['contract'] ?>" class="<?= isset($formErrors['contract']) ? 'inputError' : '' ?>" selected disabled>---</option>
                        <?php foreach ($contract as $l) { ?>
                                <option value="<?= $l->id ?>"><?= $l->name ?></option>
                        <?php } ?>
                </select>
                <p class="errors"><?= @$formErrors['contract'] ?></p>
                <p class="errors"><?= @$formInfo['contract'] ?></p>
                <div id="beginningContract" class="offInput">
                        <label for="beginningContract">Date de début :</label>
                        <input type="date" name="beginningContract" value="<?= @$_POST['beginningContract'] ?>" >
                        <p class="errors"><?= @$formErrors['beginningContract'] ?></p>
                </div>
                <div id="endContract" class="offInput">
                        <label for="endContract">Date de fin :</label>
                        <input type="date" name="endContract" value="<?= @$_POST['endContract'] ?>">
                        <p class="errors"><?= @$formErrors['endContract'] ?></p>
                </div>
                <div>
                        <button type="submit" name="validationEmployees" id="validationEmployees">Créer</button>
                </div>
        </form>
</div>
<script src="assets/js/addEmployees.js"></script>