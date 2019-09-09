<?php
session_start();
require_once '../../model/DataBase.php'; 
require_once '../../model/Event.php';
require_once '../../model/Participating.php';
// Variable pour le css
$PageCSS = '../../assets/CSS/PageCSS/news.css';

// Variables dynamiques pour la navbar à partir de pages
$home = '../../index.php';
$schoolDoors = 'schoolDoors.php';
$news = 'news.php';
$kungfu = 'kungfu.php';
$taichi = 'taichi.php';
$sanda = 'sanda.php';
$ourCircle = 'ourCircle.php';
$pictures = 'pictures.php';
$video = 'video.php';
$techniques = 'techniques.php';
$otherSchools = 'otherSchools.php';
$contact = '../form/contact.php';
$shop = 'shop.php';
$connexion = '../form/connexion.php';
$myAccount = '../form/myAccount.php';
$checkCalendar = '../form/checkCalendar.php';
$myExchanges = '../form/myExchanges.php';
$inscriptionPage = '../form/inscriptionForm.php';
$connexionPage = '../templates/connexion.php';
$deconnexionPage = '../templates/deconnexion.php';
$admin = '../../admin/admin.php';


$Participating = new Participating;

$countEventInscriptions = $Participating->countEventInscriptions();


$Event = new Event();

$displayEventsResult = $Event->displayEvent();



$registration = [];
$Participating = new Participating();

$ID_USERS = $_SESSION['userInfos'][0]['ID'];
$Participating->ID_USERS = $ID_USERS;

// On hydrate ID_EVENTS à chaque tour de boucle avec la valeur de $value['ID'] qui correspond à l'ID de l'évènement
foreach ($displayEventsResult as $value) {
$Participating->ID_EVENTS = $value['ID'];
// Afficher les valeurs de la table Participating
$displayParticipatingResult = $Participating->displayRegistration();

$registration[$value['ID']] = $displayParticipatingResult;

}

// Ajouter des valeurs dans la table Participating
if (isset($_POST['userRegistration'])) {
    // condition : si le nombre de place restante est supérieur à zéro, alors :
$Participating->ID_EVENTS = $_POST['userRegistration'];
$Participating->ID_USERS = $_SESSION['userInfos'][0]['ID'];
$Participating->CHECKED = 1;
$Participating->addRegistration();
$registrationAdded = true;
// sinon rien : alert
}

// Supprimer une inscription à un évènement
if (isset($_POST['eventRegistrationDelete'])) {
    $Participating->ID_EVENTS = $_POST['eventRegistrationDelete'];
    $Participating->ID_USERS = $_SESSION['userInfos'][0]['ID'];
    $Participating->userUnregistration();
    $registrationDeleted = true;    
} 




// Variables dynamiques pour la navbar à partir à partir de pages
$AssoInfos = '../mentions/AssoInfos.php';
$legalInfos = '../mentions/legalInfos.php';
$CGU = '../mentions/CGU.php';
$RGPD = '../mentions/RGPD.php';
