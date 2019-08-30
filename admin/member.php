<?php
require '../controller/adminControllerStart.php';
require '../controller/adminController.php';
require_once '../controller/memberController.php';
include '../view/templates/headHome.php';
?>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <p class="navbar-brand police" >Gérer les membres</p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      
    
      <li class="nav-item dropdown">
      <select class="custom-select navbarSelect">
       <option value="" selected disabled>Par grade</option>
  <option value="">Elève</option>
  <option value="">Sisook</option>
  <option value="">Simui</option>
  <option value="">Sibak</option>
  <option value="">Jiaoshe</option>
  <option value="">Taïjiaoshe</option>
  <option value="">Laoshe</option>
  <option value="">Taïlaoshe</option>
  <option value="">Sifu</option>
</select>
      </li>

      <li class="nav-item dropdown">
      <select class="custom-select navbarSelect">
       <option value="" selected disabled>Par discipline</option>
  <option value="">Kung-Fu</option>
  <option value="">Taïchi Chuan & Qi Gong</option>
  <option value="">Sanda & Shoubo</option>
  </select>
</li>

<li class="nav-item">
        <a class="nav-link" href="#">Tous les membres</a>
      </li>


     </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Nom, prénom..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </div>
</nav>



  

<?php
include 'navbarAdmin.php';
?>





<div class="container-fluid">
  <div class="row">


  <?php foreach($displayUsersResult as $displayUser) { ?>
  


  <div class="col-md-4 col-sm-12 mx-auto">
    <p class="text-white text-center police"><?= (isset($displayUser['teacherRank'])) ? $displayUser['teacherRank'] : $displayUser['status'] ?></p>
      <div class="card mx-auto" style="width: 24rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <div class="mx-auto text-center">
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>"  style="width: 20rem; height: 24rem;" class="pictureSize card-img-top img-fluid" alt="Photo de profil <?=$displayUser['picture'];?>">
</div>
<?php else: ?>
<div class="mx-auto text-center">
<?php if ($displayUser['gender'] == 'Femme') :?>
      <img src="../assets/images/female-306407_960_720.png" class="card-img-top img-fluid" style="width: 20rem; height: 24rem;" alt="Photo de profil par défaut">
     <?php else: ?>
     <img src="../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 20rem; height: 24rem;" alt="Photo de profil par défaut">
  <?php endif; ?>
      </div>
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
    <p><button type="button" id="countDeleteButton" class="badge badge-secondary btn btn-primary" data-toggle="modal" data-target="#test<?=$displayUser['ID']?>">
  Supprimer le compte
</button></p>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

 
<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>



  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    
    
  
 <!-- Début modal sécurité pour la suppression -->

<!-- Modal -->
  <div class="modal fade" id="test<?=$displayUser['ID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title red" id="exampleModalLabel">Suppression définitive</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p><i>Vous vous apprétez à supprimer définitivement le compte de <?=$displayUser['firstName']?> <?=$displayUser['lastName']?>. Toutes les données qui y sont relatives seront perdues. Êtes-vous sûr de vouloir faire cela ?</i></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Retour</button>
        <form name="deleteForm" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
        <button type="submit" value="<?=$displayUser['ID']?>" id="adminDeleteRequest" name="adminDeleteRequest" class="btn btn-primary">Confirmer la suppression</button>
</form>
      </div>
    </div>
  </div>
</div>
<?php
  }?>
  

  </div>
</div>


<div id="spaceBottom"></div>








<?php
include '../view/templates/footerAdmin.php';
include '../view/templates/AlertConnection.php';
