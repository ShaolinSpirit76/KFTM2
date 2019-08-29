<?php
require_once '../../controller/newsController.php';
include '../templates/head.php';
?>

<h1 class="police text-center" id="ourCircleTitle">Les évènements du moment</h1>



<div class="container-fluid">
  <div class="row">
<?php foreach($displayEventsResult as $displayEvent){ ?>

  
  <div class="col-md-8 col-sm-12 mx-auto text-center">
      <div class="card mx-auto text-center" style="width: 40rem;">

      <h1 class="card-title text-center police"> <?=$displayEvent['eventType']?> </h1>

      <?php if (!empty($displayEvent['eventPicture'])): ?>
            <img src="../../admin/affiches/<?=$displayEvent['eventPicture'];?>" class="card-img-top img-fluid mx-auto" style="width: 24rem; height: 22rem;" alt="Affiche de l'évènement <?=$displayEvent['eventPicture'];?>">
      <?php else: ?>
      <img src="../../assets/images/theme/karate-971341_960_720.png" class="card-img-top img-fluid mx-auto" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body">
        
        
          <p class="card-text text-center">Le <?=strftime('%A %d %B %Y',strtotime($displayEvent['eventDate']))?> </p>
   
          <a class="btn btn-primary text-center mx-auto" data-toggle="collapse" href="#eventDetails<?=$displayEvent['ID']?>" role="button" aria-expanded="false" aria-controls="eventDetails<?=$displayEvent['ID']?>">Voir les modalités</a>

                   



    
        <div class="collapse mx-auto" style="width: 37rem;" id="eventDetails<?=$displayEvent['ID']?>">
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

  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ): ?>
  <a class="btn btn-warning text-center mx-auto" role="button">S'inscrire</a>
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
include '../templates/footer.php';
