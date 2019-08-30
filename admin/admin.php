<?php
require '../controller/adminControllerStart.php';
require '../controller/adminController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<div id="adminPage" class="mx-auto text-center">

<h1 class="police text-white">BIENVENUE SUR LA PAGE ADMIN</h1>
<p class="police text-white"><?= $_SESSION['userInfos'][0]['firstName'] ?></p>

<p class="text-white">Il y a actuellement <?= $userCount[0]['number']-1 ?> membres de l'école inscrits sur le site.</p>
<p class="text-white">Parmi ces membres, il y a <?= $userCountMen[0]['numberMen']-1 ?> hommes.</p>



</div>

<?php
include '../view/templates/footerAdmin.php';
