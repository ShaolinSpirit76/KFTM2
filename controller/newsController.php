<?php
require_once '../../model/DataBase.php'; 
require_once '../../model/Event.php';
require_once '../../model/Participating.php';

$Participating = new Participating;



$Event = new Event();

$displayEventsResult = $Event->displayEvent();

$registration = [];

$ID_USERS = $_SESSION['userInfos'][0]['ID'];
$Participating->ID_USERS = $ID_USERS;

// On hydrate ID_EVENTS à chaque tour de boucle avec la valeur de $value['ID'] qui correspond à l'ID de l'évènement
foreach ($displayEventsResult as $value) {
$Participating->ID_EVENTS = $value['ID'];
// Afficher les valeurs de la table Participating
$displayParticipatingResult = $Participating->displayRegistration();

$registration[$value['ID']] = $displayParticipatingResult;
}

// Ajouter une inscription dans la table Participating
if (isset($_POST['userRegistration'])) {
    // condition : si le nombre de place restante est supérieur à zéro, alors :
$Participating->ID_EVENTS = $_POST['userRegistration'];
$Participating->ID_USERS = $_SESSION['userInfos'][0]['ID'];
$Participating->CHECKED = 1;
$Participating->addRegistration();
$registrationAdded = true;
// sinon rien -> alert 
}

// Supprimer une inscription à un évènement
if (isset($_POST['eventRegistrationDelete'])) {
    $Participating->ID_EVENTS = $_POST['eventRegistrationDelete'];
    $Participating->ID_USERS = $_SESSION['userInfos'][0]['ID'];
    $Participating->userUnregistration();
    $registrationDeleted = true;    
} 
