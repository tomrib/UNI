<?php
session_start();

// Si l'utilisateur n'est pas connecté, on le renvoie à la page d'accueil
if (!isset($_SESSION['user'])) {
    header('location: /');
    exit;
} 

// Si l'utilisateur n'est pas un employé, on lui accorde le pouvoir de changer le planning
$hasPower = $_SESSION['user']['id_usersTypes'] != 1;

// Nom des jours de la semaine
$dayNames = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

// On initialize une variable où sera stocké les jours de la semaine. Pour le besoin du planning, cette variable contiendra un tableau avec le nom des jours de la semaine, associé avec leurs date pour plus tard pour les créer dans la base de données.
$weekDays = [];

// On récupère la date actuelle, sans l'heure
$todayDate = new DateTime();
$todayDate->setTime(0, 0); 

// On trouve le lundi
$monday = clone $todayDate;
$monday->modify('last sunday +1 day');

// A partir du lundi, on génère les autres jours de la semaine juesqu'à dimanche (+7)
for ($i = 0; $i < 7; $i++) {
    $isToday = (date("N")-1) == $i;

    // Cette variable représente le jour qui sera ajouté au tableau
    $weekDay = [
        'name' => $dayNames[$i], // Nom du jour (exemple: Lundi)
        'date' => $monday->format("Y-m-d"), // Date du jour (exemple: 2024-01-01)
        'today' => $isToday // Vrai si c'est aujourd'hui, faux dans le cas contraire
    ];

    // On ajoute le nouveau jour à la table
    $weekDays[] = $weekDay;

    // Pour continuer la boucle on passe au jour suivant
    $monday->modify('+1 day');
}

require_once '../../views/includes/header.php';
require_once '../../views/plannings/planning.php';
require_once '../../views/includes/footer.php';