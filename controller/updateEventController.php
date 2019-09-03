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

// On récupère les valeurs déjà rentrées si non remplies grâce à la Session
$_SESSION['eventPicture'] = $showUpdateEventResult[0]['eventPicture'];
$_SESSION['eventCourse'] = $showUpdateEventResult[0]['eventCourse'];


// On teste les regex si le formulaire est rempli et on attribue les valeurs passées en POST

if (isset($_POST['submitUpdateEventForm'])) {
    $events->ID = $_SESSION['eventID'];
    
   
   
    // Déclaration de variables qui prennent les valeurs des $_POST respectives
    if (empty($_POST['otherEventType'])) :
    $newEventType = $_POST['newEventType'];
    else :
    $newEventType = $_POST['otherEventType'];
endif;

    $newEventCourse = $_POST['newEventCourse'];
    $newEventDate = $_POST['newEventDate'];
    $newEventHour = $_POST['newEventHour'];
    
    if(isset($_FILES['newEventPicture']) && !empty($_FILES['newEventPicture']['name'])){
        $newEventPicture = $_FILES['newEventPicture']['name'];
    }else if(isset($_FILES['firstPicture']) && !empty($_FILES['firstPicture']['name'])){
        $newEventPicture = $_FILES['firstPicture']['name'];
    }else{
        $newEventPicture = $_SESSION['eventPicture'];
    }

    $newEventMaxUser = (int)$_POST['newEventMaxUser'];
    $newEventDescription = $_POST['newEventDescription'];



// On procède à l'hydratation

    if (isset($_POST['newEventType'])):
        //objet qui contient les attributs et les méthodes de la class Event
            $events->eventType = $newEventType;
    endif;


    if (isset($_POST['newEventCourse'])):
        if (empty($_POST['newEventCourse'])):
            $events->eventCourse = $_SESSION['eventCourse'];
        else:
            $events->eventCourse = $newEventCourse;  
    endif;
endif;

    if (isset($_POST['newEventDate'])):
          $events->eventDate = $newEventDate;
    endif;

    if (isset($_POST['newEventHour'])):
        $events->eventHour = $newEventHour;
  endif;

  if (isset($newEventPicture)):
    $events->eventPicture = $newEventPicture;
else:
$events->eventPicture = $_SESSION['eventPicture'];
endif;

if (isset($_POST['newEventMaxUser'])):
    $events->eventMaxUser = $newEventMaxUser;
endif;

if (isset($_POST['newEventDescription'])):
    $events->eventDescription = $newEventDescription;
endif;



    // modal error s'il y a une erreur
    if(!empty($error)):
        $swalErrorForm = true;
        endif; 
   
 
    // alert success s'il n'y a pas d'erreur
    $events->updateEvent();

     $newUpdateEventSuccess = true;

}