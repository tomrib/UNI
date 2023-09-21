<?php
// session-start / me perme de reste avec ma connexion user
session_start();
//  unset / Détruit une variable con donne en fention
unset($_SESSION);
// session_destroy / detuit tout les donne d une connexion active
session_destroy();
// header('Location:/accueil') / revois vere la page une foit le script fin
header('Location:./Connexion');
