<?php
require '../controller/adminControllerStart.php';
require '../controller/adminController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<div id="adminPage" class="mx-auto text-center">

<h1 class="police text-white">BIENVENUE SUR LA PAGE ADMIN</h1>
<p class="police text-white"><?= $_SESSION['userInfos'][0]['firstName'] ?></p>

<div id="littleBG">
<img src="../assets/images/theme/parchment-2123469_960_720.jpg" id="homeAdminImage"  style="width: 18rem; height: 12rem;" class="card-img-top img-fluid" alt="">

<div id="countMembers">
<p class="police">Il y a actuellement <?= $userCount[0]['number']-1 ?> membres<br /> de l'école inscrits sur le site.</p>
<p class="police">Parmi ces membres,<br /> il y a <?= $userCountMen[0]['numberMen']-1 ?> hommes et <?= 
$userCountWomen[0]['numberWomen'] ?> femmes.</p>
</div>

</div>



</div>

<?php
include '../view/templates/footerAdmin.php';
