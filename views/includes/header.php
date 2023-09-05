<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise UNI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--<script src="../../assets/js/search.js"></script>-->
</head>

<body>
    <header>
        <div class="logo"><img src="assets/img/logo_temp.png" alt="Logo temporaire" width="75" height="75"></div>
        <nav>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon"></label>
            <ul>
                <form class="searchBar" method="POST">
                    <input type="text" id="searchInput" placeholder="Rechercher...">
                </form>
                <li><a href="./bureau">Accueil</a></li>
                <li class="parent">
                    <a href="#">Client(e)s</a>
                    <ul class="sub-menu">
                        <li><a href="#">Liste client(e)</a></li>
                        <li><a href="./Ajout-Client">Nouveau client(e)</a></li>
                        <li><a href="#">Archives client(e)</a></li>
                    </ul>
                </li>
                <li class="parent">
                    <a href="#">Sous-traitant</a>
                    <ul class="sub-menu">
                        <li><a href="#">Liste sous-traitant</a></li>
                        <li><a href="#">Nouveau sous-traitant</a></li>
                        <li><a href="#">Archives sous-traitant</a></li>
                    </ul>
                </li>
                <li class="parent">
                    <a href="#">Employé(e)s</a>
                    <ul class="sub-menu">
                        <li><a href="./Liste-Employer">Liste employé(e)</a></li>
                        <li><a href="./Ajout-Employer">Nouveau employé(s)</a></li>
                        <li><a href="#">Archives employé(e)</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Archives interventions</a>
                </li>
                <li class="login-modal-trigger"><a href="./deconnecter">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    <main>