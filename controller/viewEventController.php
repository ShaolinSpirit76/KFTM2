<?php
session_start();
require_once '../model/DataBase.php';
require_once '../model/Event.php';
require_once '../model/Participating.php';

$Event = new Event();

$participants = new Participating();

$displayEventsResult = $Event->displayEvent();

if (isset($_POST['changeEvent'])){
$showUpdateEventResult = $Event->showUpdateEvent();
}

// Supprimer l'évènement
if (isset($_POST['deleteEvent'])) {
    $ID = (int)$_POST['deleteEvent'];
    $Event->ID = $ID;
    $participants->ID_EVENTS = $ID;
    
    $participantsNumber = $participants->participantsNumber();
    
    if((int)$participantsNumber[0]['number'] > 0){
        $participants->deleteAllParticipant();
    }
    if($Event->adminDeleteEvent()){
        $eventDeleted = true;
        }    
}

