<?php
if ($_SESSION['userInfos'][0]['admin'] !== '1'){
    header('Location: ../view/templates/error.php');
}

require_once '../model/DataBase.php';
require_once '../model/User.php';
require_once '../model/Event.php';
require_once '../model/Participating.php';

$user = new User();
$userCount = $user->countUsers();
$userCountMen = $user->countMen();
$userCountWomen = $user->countWomen();

$event = new Event();
$eventCountEvent = $event->countEvent();
