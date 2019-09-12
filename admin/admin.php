<?php
require_once '../controller/adminControllerStart.php';
require_once '../controller/adminController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<div id="adminPage" class="mx-auto text-center">

<h1 class="police text-white">BIENVENUE SUR LA PLATEFORME ADMIN
<a href="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" target="_blank" title="Cliquez pour agrandir"><img src="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" class="img-fluid rounded" style="width: 8rem; height: 8rem;" alt="photo de profil" width="100%" height="100%" /></a></h1>



<div id="searchAdmin">
<form class="form-inline justify-content-center align-items-center">
      <input class="form-control mr-sm-2" type="search" placeholder="<?= $_SESSION['userInfos'][0]['firstName'] ?>" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
</div>

<div class="row mb-3 mt-2">
    <div class="col-md-4 offset-md-8 col-12">
<a href="member.php">
    <div class="littleBG">
<img src="../assets/images/theme/parchment-2123469_960_720.jpg" id="homeAdminImage"  style="width: 18rem; height: 12rem;" class="card-img-top img-fluid" alt="Vieux parchemin">

<div id="countMembers" class="police2 font-weight-bold">
    
<p>Membres inscrits : <?= $userCount[0]['number']-1 ?></p>
<p>Hommes : <?= $userCountMen[0]['numberMen']-1 ?></p>
<p>Femmes : <?= $userCountWomen[0]['numberWomen'] ?></p>
<p> Admin : <?= $userCountAdmin[0]['numberAdmin'] ?></p>

</div>

</div></a>
</div>
</div>

<div class="row">
<div class="col-md-4 offset-md-8 col-12">
<a href="viewEvent.php">
    <div class="littleBG2">
<img src="../assets/images/theme/parchment-2123469_960_720.jpg" id="homeAdminImage"  style="width: 20rem; height: 10rem;" class="card-img-top img-fluid" alt="">

<div id="countEvents" class="police2 font-weight-bold">
    
<p>Evènements en cours : <?= $eventCountEvent[0]['number'] ?></p>
<p>Clôturés : 0</p>
<p>Non clôturés : <?= $eventCountEvent[0]['number'] ?></p>

</div></div></a>
</div>
</div>




</div>

<?php
include '../view/templates/footerAdmin.php';
