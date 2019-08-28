<?php
require '../controller/adminControllerStart.php';
require '../controller/adminController.php';
require_once '../controller/memberController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<div id="memberPage">






<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
<?php if ($displayUser['teacherRank'] === 'Sifu'): ?>






  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
        <div class="mx-auto text-center">
          <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary text-center mx-auto" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a>
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




  <?php endif;
  } ?>
</div>
</div>





















<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['teacherRank'] === 'Tailaoshe'): ?>




  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
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





  <?php endif;
   }?>
</div>
</div>





















<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['teacherRank'] === 'Laoshe'): ?>






  <div class="col-md-4 col-sm-12 mx-auto">
        <div class="card mx-auto" style="width: 18rem;">

        <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
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





  <?php endif;
  }?>
</div>
</div>




















<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['teacherRank'] === 'Taïjiaoshe'): ?>






  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
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





  <?php endif;
  }?>
</div>
</div>
























<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['teacherRank'] === 'Jiaoshe'): ?>






  <div class="col-md-4 col-sm-12 mx-auto">
       <div class="card mx-auto" style="width: 18rem;">

       <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
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





  <?php endif;
  }?>
</div>
</div>
































<div class="container-fluid">
  <div class="row">



<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['teacherRank'] === 'Sibak'): ?>


  <div class="col-md-4 col-sm-12 mx-auto">

      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
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





  <?php endif;
  }?>
  </div>
</div>













<div class="container-fluid">
  <div class="row">



<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['status'] === 'élève'): ?>


  <div class="col-md-4 col-sm-12 mx-auto">

      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../view/form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">Voir les infos</a><br /><br />
    <button type="button" id="countDeleteButton" class="badge badge-secondary" data-toggle="modal" data-target="#securityModal">Supprimer le compte</button>
</div>

        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">


<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>

  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>




  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>


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





  <?php endif;
  }?>
  </div>
</div>






<!-- Début modal sécurité pour la suppression -->

<div id="countDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header text-white" style="background-color:black;">
        <h5 class="modal-title red">Action irréversible</h5>
        <button type="button" id="crossBackDelete" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- action : permet de désigner la page actuelle -->
<form name="deleteForm" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
  <div class="text-center">

  <span><label for="passwordConnect">Mot de passe </label><br /> <input class="<?php echo (isset($_POST['passwordConnect']) && !preg_match($regexPassword, $_POST['passwordConnect']))? 'red':'';  ?>" type="password" name="passwordConnect" id="passwordConnect" placeholder="Mot de passe" /><small class="text-muted"><br />Renseigné lors de votre inscription.</small><p class="errorMessage"><?= (isset($error['errorPassword'])) ? $error['errorPassword'] : ''; ?></p></span>

  <p><button type="button" id="backDelete" class="btn btn-secondary"data-dismiss="modal">Retour</button>
  <button id="adminDeleteRequest" name="adminDeleteRequest" class="yellow-hover btn btn-primary">Confirmer la suppression</button><br /></p>
</form>
</div>
<div class="modal-footer" style="background-color:#282828;">
<p><small class="text-white"><i>Vous vous apprétez à supprimer définitivement le compte. Toutes les données relatives qui y sont relatives seront perdues.</i></small></p>
        </div>
    </div>
    </div>
</div>

<!-- Fin modal sécurité pour la suppression -->






</div>

<?php
include '../view/templates/footerAdmin.php';
include '../view/templates/AlertConnection.php';
