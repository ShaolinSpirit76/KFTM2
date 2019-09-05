<?php
$_POST = array_map('strip_tags', $_POST); // Ligne à mettre absolument pour la sécurité : interdit l'injection de script (balises non autorisées)

// On crée un tableau error qui s'auto-incrémentera avec la valeur de l'erreur que nous lui assignerons au cas par cas, si la regex n'est pas franchie. Chaque cellule remplie comptera pour 1.
$error = [];
$events = new Event();


// On teste les regex si le formulaire est rempli
if (count($_POST) > 0):
    // Déclaration de variables qui prennent les valeurs des $_POST respectives
    $eventType = $_POST['eventType'];
    $eventCourse = $_POST['eventCourse'];
    $eventDate = $_POST['eventDate'];
    $eventHour = $_POST['eventHour'];

if (!empty($_POST['registeredPicture'])):
        $registeredPicture = $_POST['registeredPicture'];
        $eventPicture = NULL;
    elseif (!empty($_FILES['eventPicture'])) :
        $eventPicture = $_FILES['eventPicture']['name'];
        $registeredPicture = NULL;
    elseif ( (empty($eventPicture)) || ($eventPicture == '') || (empty($registeredPicture)) || ($registeredPicture == '') ) :
        $eventPicture = NULL;
        $registeredPicture = NULL;
    endif;

    $eventMaxUser = (int)$_POST['eventMaxUser'];
    $eventDescription = $_POST['eventDescription'];
    
    
    
    $events->eventPicture = $eventPicture;
    $events->registeredPicture = $registeredPicture;

    if( (empty($eventDescription)) || ($eventDescription == '') ):
$eventDescription = NULL;
    else:
        $events->eventDescription = $eventDescription;
    endif;
  

    // modal error s'il y a une erreur
    if(!empty($error)):
        $swalErrorForm = true;
        endif; 
   
endif;


if (isset($_POST['submitNewEventForm'])) {

if(empty($error)):
    
    if (!empty($_POST['otherEventType'])) :
     $eventType = $_POST['otherEventType'];
endif;
$events->eventType = $eventType;
    $events->eventCourse = $eventCourse;
    $events->eventDate = $eventDate;
    $events->eventHour = $eventHour;
    $events->eventPicture = $eventPicture;
    $events->registeredPicture = $registeredPicture;
    $events->eventMaxUser = $eventMaxUser;
    $events->eventDescription = $eventDescription;
    // alert success s'il n'y a pas d'erreur
    $events->addEvent();
    $newEventSuccess = true;
else:
    $swalErrorForm = true;
endif;

}