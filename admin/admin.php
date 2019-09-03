<?php
require '../controller/adminControllerStart.php';
require '../controller/adminController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<div id="adminPage" class="mx-auto text-center">

<h1 class="police text-white">BIENVENUE SUR LA PAGE ADMIN</h1>
<p class="police text-white"><?= $_SESSION['userInfos'][0]['firstName'] ?></p>

<a href="member.php"><div class="littleBG">
<img src="../assets/images/theme/parchment-2123469_960_720.jpg" id="homeAdminImage"  style="width: 18rem; height: 12rem;" class="card-img-top img-fluid" alt="Vieux parchemin">

<div id="countMembers" class="police2 font-weight-bold">
<p>Il y a actuellement <?= $userCount[0]['number']-1 ?> membres<br /> de l'école inscrits sur le site.</p>
<p>Parmi ces membres,<br /> il y a <?= $userCountMen[0]['numberMen']-1 ?> hommes et <?= 
$userCountWomen[0]['numberWomen'] ?> femmes.</p>
</div>

</div></a>

<a href="viewEvent.php"><div class="littleBG2">
<img src="../assets/images/theme/parchment-2123469_960_720.jpg" id="homeAdminImage"  style="width: 18rem; height: 8rem;" class="card-img-top img-fluid" alt="">

<div id="countEvents" class="police2 font-weight-bold">
<p>Il y a actuellement <?= $eventCountEvent[0]['number'] ?> évènements<br /> publiés sur le site.</p>

</div>

</div></a>



</div>

<?php
include '../view/templates/footerAdmin.php';
