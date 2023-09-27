<?php require_once 'controllers/loginController.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="displayForm">
        <form id="loginForm" method="POST">
            <h1>Bienvenue chez UNI</h1>
            <label for="login">ADRESSE MAIL</label>
            <input name="loginEmail" type="text" id="login" placeholder="login" autofocus required>
            
            <label for="password">MOT DE PASSE</label>
            <div class="eye">
                <input name="loginPassword" type="password" id="password" class="passwordInput" placeholder="mot de passe" required>
                <button type="button" id="showPassword" class="passwordToggleBtn">
                    <i class="far fa-eye-slash"></i>
                </button>
            </div>
            <p class="errors"><?= @$formErrors['loginEmail'] ?></p>

            <!-- Boutons d'action -->
            <button id="validationLogin" type="submit">Valider</button>
            <button type="button" onclick="annuler()">Annuler</button>
            <button id="lostMdp" type="button" onclick="motDePassePerdu()">Mot de passe perdu</button>
        </form>

    </div>
    <script src="assets/js/login.js" defer></script>
</body>

</html>