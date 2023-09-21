<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise UNI</title>
    <link rel="icon" href="./favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="32x32" href="/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo"><img src="assets/img/logo_temp.png" alt="Logo temporaire" width="75" height="75"></div>
            <input type="checkBox" id="menuToggle">
            <label for="menuToggle" class="menuIcon"></label>
            <div class="searchBar">
                <form class="barSearch" method="POST">
                    <input type="text" id="searchInput" placeholder="Rechercher...">
                </form>
            </div>
            <ul>
                <li><a href="./Bureau">Accueil</a></li>
                <li class="parent">
                    <a href="#">Client(e)s</a>
                    <ul class="subMenu">
                        <li><a href="./Liste-Client">Liste client(e)</a></li>
                        <li><a href="./Ajout-Client">Nouveau client(e)</a></li>
                        <li><a href="#">Archives client(e)</a></li>
                    </ul>
                </li>
                <li class="parent">
                    <a href="#">Sous-traitant</a>
                    <ul class="subMenu">
                        <li><a href="./Liste-Sous-Traitant">Liste sous-traitant</a></li>
                        <li><a href="#">Nouveau sous-traitant</a></li>
                        <li><a href="#">Archives sous-traitant</a></li>
                    </ul>
                </li>
                <li class="parent">
                    <a href="#">Employé(e)s</a>
                    <ul class="subMenu">
                        <li><a href="./Liste-Employer">Liste employé(e)</a></li>
                        <li><a href="./Ajout-Employer">Nouveau employé(s)</a></li>
                        <li><a href="#">Archives employé(e)</a></li>
                    </ul>
                </li>
                <li class="parent">
                    <a href="#">Interventions</a>
                    <ul class="subMenu">
                        <li><a href="#">Liste intervention</a></li>
                        <li><a href="#">Créer une intervention</a></li>
                        <li><a href="#">Archives intervention</a></li>
                    </ul>
                </li>
                <li class="loginModalTrigger"><a href="./Deconnecter">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    <main>