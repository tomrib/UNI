<?php require_once 'controllers/loginController.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODE POUR LE LOGIN ACCUEIL A RECUP</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
</head>

<body>
    <!-- Formulaire de connexion -->
    <form id="loginForm" method="POST">
        <h2>Bienvenu(e) chez UNI</h2>
        <label for="login">ADRESSE MAIL</label>
        <input name="loginEmail" type="text" id="login" placeholder="login" autofocus required>

        <label for="loginPassword">MOT DE PASSE</label>
        <input name="loginPassword" type="password" id="loginPassword" placeholder="mot de passe" required>
        <p class="errors"><?= @$formErrors['loginEmail'] ?></p>
        <!-- Boutons d'action -->
        <button id="validatioLogin" type="sudmit">Valider</button>
        <button type="button" onclick="annuler()">Annuler</button>
        <button id="lostMdp" type="button" onclick="motDePassePerdu()" m>Mot de passe perdu</button>
    </form>
    <script src="login.js" defer></script>
</body>

</html>