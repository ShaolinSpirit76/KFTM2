<?php
require_once '../controller/viewEventControllerStart.php';
require_once '../controller/adminController.php';
require_once '../controller/viewEventController.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
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

      <div class="card-body police2">
        
        
          <p class="card-text text-center">Le <?=strftime('%A %d %B %Y',strtotime($displayEvent['eventDate']))?> </p>
   
          

         
<form  method="POST" action="updateEvent.php">

<a class="btn btn-primary text-center mx-auto" data-toggle="collapse" href="#eventDetails<?=$displayEvent['ID']?>" role="button" aria-expanded="false" aria-controls="eventDetails<?=$displayEvent['ID']?>">Voir les modalités</a>

<button name="changeEvent" class="btn btn-primary text-center mx-auto" value="<?= $displayEvent['ID'] ?>" type="submit">Modifier</button>

<button type="button" id="eventDeleteButton" class="badge badge-secondary btn btn-primary" data-toggle="modal" data-target="#deleteEvent<?=$displayEvent['ID']?>">Supprimer</button>


<br /><br />
</form>

                   



    
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



  </div>
</div>



  </div>
</div>

       
</div>



<!-- Début modal sécurité pour supprimer un évènement -->

<!-- Modal -->
<div class="modal fade" id="deleteEvent<?=$displayEvent['ID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title red" id="exampleModalLabel">Suppression d'évènement</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p><i>Vous vous apprétez à supprimer l'évènement : <span class="font-weight-bolder"><?=$displayEvent['eventType']?></span> du <span class="font-weight-bolder"><?=strftime('%A %d %B %Y',strtotime($displayEvent['eventDate']))?></span>. Cela signifie que toutes les informations qui y sont liées seront définitivement perdues. Êtes-vous sûr de vouloir faire cela ?</i></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Retour</button>
        <form name="deleteForm" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
        <button type="submit" value="<?=$displayEvent['ID']?>" id="deleteEvent" name="deleteEvent" class="btn btn-primary">Confirmer la suppression</button>

        </form>
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
include '../view/templates/AlertConnection.php';
