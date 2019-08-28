<?php

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
    $eventPicture = $_FILES['eventPicture']['name'];
    $eventMaxUser = (int)$_POST['eventMaxUser'];
    $eventDescription = $_POST['eventDescription'];
    
    $_POST = array_map('strip_tags', $_POST); // Ligne à mettre absolument pour la sécurité : interdit l'injection de script (balises non autorisées)
    
   
  

    // modal error s'il y a une erreur
    if(!empty($error)):
        $swalErrorForm = true;
        endif; 
   
endif;


if (isset($_POST['submitNewEventForm'])) {

if(empty($error)):
    var_dump($_POST);
     if (!empty($_POST['otherEventType'])) :
     $eventType = $_POST['otherEventType'];
endif;
$events->eventType = $eventType;
    $events->eventCourse = $eventCourse;
    $events->eventDate = $eventDate;
    $events->eventHour = $eventHour;
    $events->eventPicture = $eventPicture;
    $events->eventMaxUser = $eventMaxUser;
    $events->eventDescription = $eventDescription;
    // alert success s'il n'y a pas d'erreur
    $events->addEvent();
 //$newEventSuccess = true;
else:
    $swalErrorForm = true;
endif;

}