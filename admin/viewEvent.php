<?php
require '../controller/viewEventControllerStart.php';
require '../controller/adminController.php';
require_once '../controller/viewEventController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>

<h1 class="police text-center" id="ourCircleTitle">Les évènements du moment</h1>



<div class="container-fluid space">
  <div class="row">
<?php foreach($displayEventsResult as $displayEvent){ ?>

  
  <div class="col-md-6 col-sm-12 mx-auto text-center">
      <div class="card mx-auto text-center" style="width: 30rem;">

      <h1 class="card-title text-center"> <?=$displayEvent['eventType']?> </h1>

      <?php if (!empty($displayEvent['eventPicture'])): ?>
      <img src="../../admin/miniatures/<?=$displayEvent['eventPicture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Affiche de l'évènement <?=$displayEvent['eventPicture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
        <div class="mx-auto text-center">
        
          <p class="card-text text-center">Le <?=strftime('%d/%m/%Y',strtotime($displayEvent['eventDate']))?> </p>
   
          <a class="btn btn-primary text-center mx-auto" data-toggle="collapse" href="#eventDetails<?=$displayEvent['ID']?>" role="button" aria-expanded="false" aria-controls="eventDetails<?=$displayEvent['ID']?>">Voir les modalités</a>

          <a class="btn btn-primary text-center mx-auto" href="#" role="button">Modifier</a>

          <a class="btn btn-primary text-center mx-auto" href="#" role="button">Supprimer</a>
                   
</div>


    
        <div class="collapse" style="width: 40rem;" id="eventDetails<?=$displayEvent['ID']?>">
  <div class="card card-body">

  
    <?php if (isset($displayEvent['eventCourse'])): ?>
  <p class="text-white">Groupe concerné : <?= $displayEvent['eventCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayEvent['eventHour'])): ?>
  <p class="text-white">Horaires : <?= $displayEvent['eventHour']?> </p>
  <?php endif; ?>

  <?php if (isset($displayEvent['eventMaxUser'])): ?>
  <p class="text-white">Maximum de participants : <?= $displayEvent['eventMaxUser']?> </p>
  <?php endif; ?>

  <?php if (isset($displayEvent['eventDescription'])): ?>
  <p class="text-white">Description : <?= $displayEvent['eventDescription']?> </p>
  <?php endif; ?>
  

  </div>
</div>



  </div>
</div>

       
</div>



    
  <?php 
  } ?>
</div>
</div>



<?php
include '../view/templates/footer.php';
