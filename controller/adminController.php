<?php
if ($_SESSION['userInfos'][0]['mail'] !== 'levray.jm@wanadoo.fr'){
    header('Location: ../view/templates/error.php');
}

require '../model/DataBase.php';
require '../model/User.php';
require '../model/Event.php';

$user = new User();
$userCount = $user->countUsers();

