<?php
session_start();
require_once '../model/DataBase.php';
require_once '../model/Event.php';

$Event = new Event();

$displayEventsResult = $Event->displayEvent();

if (isset($_POST['changeEvent'])){
$showUpdateEventResult = $Event->showUpdateEvent();
}

// Supprimer l'évènement
if (isset($_POST['deleteEvent'])) {
    $ID = (int)$_POST['deleteEvent'];
    $Event->ID = $ID;
    if($Event->adminDeleteEvent()){
        $eventDeleted = true;
        }    
}

