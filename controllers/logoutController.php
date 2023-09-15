<?php
//TODO session-start / me permet de rester avec ma connexion user
session_start();
//TODO  unset / Détruit une variable de la fonction unset
unset($_SESSION);
//TODO session_destroy / détruit tout les données d une connexion active
session_destroy();
//TODO header('Location:/accueil') / renvois vere la page une foit le script fin
header('Location:./Connexion');
exit;
