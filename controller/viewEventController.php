<?php

$Event = new Event();

$displayEventsResult = $Event->displayEvent();

if (isset($_POST['changeEvent'])):
$showUpdateEventResult = $Event->showUpdateEvent();
endif;