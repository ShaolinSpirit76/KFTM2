<?php

$Event = new Event();

$displayEventsResult = $Event->displayEvent();

if (isset($_POST['changeEvent'])):
$showUpdateEventResult = $Event->showUpdateEvent();
endif;

if (isset($_POST['deleteEvent'])):
$adminDeleteEvent = $Event->adminDeleteEvent();
$eventDeleted = true;
endif;