<?php
session_start();
require_once '../model/DataBase.php';
require_once '../model/User.php';
require_once '../model/Event.php';

$_POST = array_map('strip_tags', $_POST); // Ligne à mettre absolument pour la sécurité : interdit l'injection de script (balises non autorisées)

// On crée un tableau error qui s'auto-incrémentera avec la valeur de l'erreur que nous lui assignerons au cas par cas, si la regex n'est pas franchie. Chaque cellule remplie comptera pour 1.
$error = [];
$events = new Event();

if(!empty($_POST['changeEvent'])):
$_SESSION['eventID'] = $_POST['changeEvent'];
endif;

$events->ID = $_SESSION['eventID'];
$showUpdateEventResult = $events->showUpdateEvent();

// On récupère les valeurs déjà rentrées (si non remplies) grâce à la Session
$_SESSION['eventPicture'] = $showUpdateEventResult[0]['eventPicture'];
$_SESSION['registeredPicture'] = $showUpdateEventResult[0]['registeredPicture'];
$_SESSION['eventCourse'] = $showUpdateEventResult[0]['eventCourse'];

// On teste les regex si le formulaire est rempli et on attribue les valeurs passées en POST

if (isset($_POST['submitUpdateEventForm'])) {
    $events->ID = $_SESSION['eventID'];
       
    // Déclaration de variables qui prennent les valeurs des $_POST respectives
    if ( ($_POST['newEventType'] == 'Autre') && (!empty($_POST['otherEventType'])) ) :
        $newEventType = $_POST['otherEventType'];
    else :
        $newEventType = $_POST['newEventType'];
endif;

if (empty($_POST['newEventCourse'])):
    $newEventCourse = $showUpdateEventResult[0]['eventCourse'];
    else:
    $newEventCourse = $_POST['newEventCourse'];
endif;

    $newEventDate = $_POST['newEventDate'];
    $newEventHour = $_POST['newEventHour'];
    
    if (!empty($_POST['newRegisteredPicture'])):
        
        $newRegisteredPicture = $_POST['newRegisteredPicture'];
        $newEventPicture = NULL;
    elseif (!empty($_FILES['newEventPicture']['name'])) :
        
        $newEventPicture = $_FILES['newEventPicture']['name'];
        $newRegisteredPicture = NULL;
    elseif (!empty($_FILES['firstPicture']['name'])):
        
        $newEventPicture = $_FILES['firstPicture']['name'];
        $newRegisteredPicture = NULL;
        elseif (!empty($_POST['firstRegisteredPicture'])):
      
        $newEventPicture = NULL;
        $newRegisteredPicture = $_POST['firstRegisteredPicture'];

    elseif ( (empty($_FILES['newEventPicture']['name'])) || ($_FILES['newEventPicture']['name'] == '') || (empty($_POST['newRegisteredPicture'])) || ($_POST['newRegisteredPicture'] == '') || (empty($_FILES['firstPicture']['name'])) || ($_FILES['firstPicture']['name'] == '') || (empty($_POST['firstRegisteredPicture'])) || ($_POST['firstRegisteredPicture'] == '') ) :
        $newEventPicture = $_SESSION['eventPicture'];
        $newRegisteredPicture = $_SESSION['registeredPicture'];
    endif;

      $newEventMaxUser = (int)$_POST['newEventMaxUser'];
    $newEventDescription = $_POST['newEventDescription'];

// On procède à l'hydratation

    if (isset($_POST['newEventType'])):
        //objet qui contient les attributs et les méthodes de la class Event
            $events->eventType = $newEventType;
    endif;    
            $events->eventCourse = $newEventCourse;  
 
    if (isset($_POST['newEventDate'])):
          $events->eventDate = $newEventDate;
    endif;

    if (isset($_POST['newEventHour'])):
        $events->eventHour = $newEventHour;
  endif;
 
    $events->eventPicture = $newEventPicture;
    $events->registeredPicture = $newRegisteredPicture;

if (isset($_POST['newEventMaxUser'])):
    $events->eventMaxUser = $newEventMaxUser;
endif;

if (isset($_POST['newEventDescription'])):
    $events->eventDescription = $newEventDescription;
endif;

    // alert error s'il y a une erreur
    if(!empty($error)):
        $swalErrorForm = true;
        endif; 
   
    // alert success s'il n'y a pas d'erreur
        $events->updateEvent();

    $newUpdateEventSuccess = true;

}