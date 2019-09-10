<?php
require_once '../controller/newEventControllerStart.php';
require_once '../controller/adminController.php';
require_once '../controller/updateEventController.php';
include '../controller/regex.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>




<!-- Début formulaire d'inscription -->

<div id="newEventTitle" class="col-md-10 col-lg-5 col-sm-10 offset-sm-1 col mx-auto">
<h1 class="police text-white text-center">Modification de l'évènement </h1>
</div>

<form method="POST" action="updateEvent.php" id="newEventForm" name="newEventForm" 
enctype="multipart/form-data">
               <div class="card mx-auto" id="generation" style="width: 30rem;">
  <div class="card-body">
      <fieldset>


<div class="space">
      <li class="font-weight-bolder">
       <!-- Condition à gérer pour n'afficher le label que si l'évènement est autre -->
      <label for="eventType">Nom de l'évènement : <?= $showUpdateEventResult[0]['eventType'] ?></label>
      <select id="eventType" name="newEventType" class="inputNewEvent" required>
            <option selected disabled>Choisissez</option>
                <option value="Tournoi" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Tournoi' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Tournoi' ? 'selected' : '') ?> >Tournoi</option> 
                <option value="Compétition" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Compétition' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Compétition' ? 'selected' : '') ?> >Compétition</option>
                <option value="Représentation" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Représentation' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Représentation' ? 'selected' : '') ?> >Représentation</option>
                <option value="Passage de grade" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Passage de grade' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Passage de grade' ? 'selected' : '') ?> >Passage de grade</option>
                <option value="Stage de casse" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Stage de casse' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Stage de casse' ? 'selected' : '') ?> >Stage de casse</option>
                <option value="Entraînement spécial" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Entraînement spécial' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Entraînement spécial' ? 'selected' : '') ?> >Entraînement spécial</option>
                <option value="Séminaire d'été" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Séminaire d\'été' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Séminaire d\'été' ? 'selected' : '') ?> >Séminaire d'été</option>
                <option value="Barbecue de fin d'année" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Barbecue de fin d\'année' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Barbecue de fin d\'année' ? 'selected' : '') ?> >Barbecue de fin d'année</option>
                <option value="Autre" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Autre' ? 'selected' : ($showUpdateEventResult[0]['eventType'] == 'Autre' ? 'selected' : '') ?> >Autre </option>
</select>


      <input name="otherEventType" value="<?= isset($_POST['otherEventType']) && !empty($_POST['otherEventType']) ? $_POST['otherEventType'] : $showUpdateEventResult[0]['eventType'] ?>" type="text" id="otherEventType" placeholder="Veuillez préciser..." />
</li>
</div>


<div id="eventCourse" class="space">
<li class="font-weight-bolder"> 
<label for="eventCourse">Groupe concerné : <?= $showUpdateEventResult[0]['eventCourse'] ?></label>

  <p><input type="radio" id="Kung-Fu" name="newEventCourse" value="Kung-Fu">
  <label for="Kung-Fu">Kung-Fu <span class="formColor">~~~</span> </label>

  <input type="radio" id="Taïchi Chuan & Qi Gong" name="newEventCourse" value="Taïchi Chuan & Qi Gong">
  <label for="Taïchi Chuan & Qi Gong">Taïchi <span class="formColor">~~~</span> </label>

  <input type="radio" id="Sanda & Shoubo" name="newEventCourse" value="Sanda & Shoubo">
  <label for="Sanda & Shoubo">Sanda <span class="formColor">~~~</span> </label>

  <input type="radio" id="Tout le monde" name="newEventCourse" value="Tout le monde">
  <label for="Tout le monde">Tous</label></p>
    
            
            </li>
</div>


<div class="space">

<li class="font-weight-bolder"><label for="eventDate">Date de l'évènement : </label> <input class="inputNewEvent" value="<?= (!empty($_POST['eventDate']))? $_POST['eventDate'] : $showUpdateEventResult[0]['eventDate']?>" type="date" name="newEventDate" id="eventDate" placeholder="jj/mm/aaaa" required  /></li>

</div>

<div class="space">

<li class="font-weight-bolder"><label for="eventHour">Heure : </label> <input class="inputNewEvent" value="<?= (!empty($_POST['eventHour']))? $_POST['eventHour'] : $showUpdateEventResult[0]['eventHour']?>" type="time" name="newEventHour" id="eventHour" required /></li>

</div>

<div class="space">

<li class="font-weight-bolder"><label for="eventMaxUser">Nombre de participants maximal : </label> <input class="inputNewEvent" value="<?= (!empty($_POST['eventMaxUser']))? $_POST['eventMaxUser'] : $showUpdateEventResult[0]['eventMaxUser']?>" type="number" min="1" max="100" name="newEventMaxUser" id="eventMaxUser" /></li>

</div>


<div class="space">


<?php if ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture'])) ): ?>
            
<label for="picture" class="font-weight-bolder">Affiche : </label>
 
  <a href="affiches/<?=(isset($showUpdateEventResult[0]['eventPicture'])) ? $showUpdateEventResult[0]['eventPicture'] : $showUpdateEventResult[0]['registeredPicture']?>" target="_blank" title="Cliquez pour agrandir"><img src="affiches/<?=(isset($showUpdateEventResult[0]['eventPicture'])) ? $showUpdateEventResult[0]['eventPicture'] : $showUpdateEventResult[0]['registeredPicture']?>" class="img-fluid rounded" alt="Affiche : <?=(isset($showUpdateEventResult[0]['eventPicture'])) ? $showUpdateEventResult[0]['eventPicture'] : $showUpdateEventResult[0]['registeredPicture']?>" width="15%" height="15%" /></a>
<?php
// Nous faisons un echo du nom de l'image
echo (isset($showUpdateEventResult[0]['eventPicture'])) ? $showUpdateEventResult[0]['eventPicture'] : $showUpdateEventResult[0]['registeredPicture'] ?><br /><button type="button" class="badge badge-secondary" id="updatePicture">Changer l'affiche</button>
    
    <div id="newPic">
       <!-- Code pour upload la photo de profil. On ne récupère que le nom dans la BDD -->
       <?php 
// on test si un fichier a été sélectionné en upload
if (isset($_FILES['newEventPicture']['tmp_name'])) { 
  // $taille est un Array contenant les infos de l'image
  $taille = getimagesize($_FILES['newEventPicture']['tmp_name']); 

  // on récupère la largeur et la hauteur de l'image
  $largeur = $taille[0]; 
  $hauteur = $taille[1];

  // Transformation selon les besoins de la miniature
  $largeur_miniature = 300;
  $hauteur_miniature = $hauteur / $largeur * 300;

  $im = imagecreatefromjpeg($_FILES['newEventPicture']['tmp_name']);
  $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
  
  imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
  
  imagejpeg($im_miniature, 'affiches/'.$_FILES['newEventPicture']['name'], 90);
  
echo '<img src="affiches/' . $_FILES['newEventPicture']['name'] . '">';
}
// Nous faisons un echo du nom de l'image
echo($_FILES['newEventPicture']['name']);                  

                  ?>

<li class="font-weight-bolder space"> <label for="pictureChoice">Ajouter une affiche : </label>

<p><input type="button" id="personalPictureChoice" value="Personnelle" />
  
  <input type="button" id="registeredPictureChoice" value="Modèles pré-enregistrés" />
 </li>

<div id="personalPicture" class="space">
                 
                 <li class="font-weight-bolder space"> <label for="eventPicture">Affiche de l'évènement : </label></li>
        <input type="file" name="newEventPicture" id="eventPicture" />
        <small><i><br />Un .jpg, c'est mieux ;)</i></small>
</div>

<div id="registeredPicture" class="space">

<li class="font-weight-bolder space"> <label for="registeredPicture">Affiche de l'évènement : </label></li>

<button type="button" class="badge badge-primary" data-toggle="modal" data-target="#tournoi">
  <span >Tournoi</span></button>
<button type="button" class="badge badge-secondary" data-toggle="modal" data-target="#competition">
  <span >Compétition</span></button>
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#representation">
  <span >Représentation</span></button>
<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#passageDeGrade">
    <span >Passage de grade</span></button>
<button type="button" class="badge badge-warning" data-toggle="modal" data-target="#stageDeCasse">
      <span >Stage de casse</span></button>
<button type="button" class="badge badge-info" data-toggle="modal" data-target="#entrainement">
        <span >Entraînement spécial</span></button>
<button type="button" class="badge badge-light" data-toggle="modal" data-target="#seminaire">
  <span >Séminaire d'été</span></button>
<button type="button" class="badge badge-dark" data-toggle="modal" data-target="#barbecue">
    <span >Barbecue de fin d'année</span></button>

</div>

</div>

      <?php else:

//  Code pour upload la photo de profil. On ne récupère que le nom dans la BDD 

// on test si un fichier a été sélectionné en upload
if (isset($_FILES['firstPicture']['tmp_name'])) { 
// $taille est un Array contenant les infos de l'image
$taille = getimagesize($_FILES['firstPicture']['tmp_name']); 

// on récupère la largeur et la hauteur de l'image
$largeur = $taille[0]; 
$hauteur = $taille[1];

// Transformation selon les besoins de la miniature
$largeur_miniature = 300;
$hauteur_miniature = $hauteur / $largeur * 300;

$im = imagecreatefromjpeg($_FILES['firstPicture']['tmp_name']);
$im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);

imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);

imagejpeg($im_miniature, 'affiches/'.$_FILES['firstPicture']['name'], 90);

echo '<img src="affiches/' . $_FILES['firstPicture']['name'] . '">';
}
// Nous faisons un echo du nom de l'image
echo($_FILES['firstPicture']['name']);                  

 ?>

<li class="font-weight-bolder space"> <label for="pictureChoice">Ajouter une affiche : </label>
<p><input type="button" id="personalPictureChoice" value="Personnelle" />
  

  <input type="button" id="registeredPictureChoice" value="Modèles pré-enregistrés" />
 </li>

<div id="personalPicture" class="space">
                 
                 <li class="font-weight-bolder space"> <label for="eventPicture">Affiche de l'évènement : </label></li>
        <input type="file" name="firstPicture" id="eventPicture" />
        <small><i><br />Un .jpg, c'est mieux ;)</i></small>
</div>

<div id="registeredPicture" class="space">

<li class="font-weight-bolder space"> <label for="registeredPicture">Affiche de l'évènement : </label></li>

<button type="button" class="badge badge-primary" data-toggle="modal" data-target="#tournoi">
  <span >Tournoi</span></button>
<button type="button" class="badge badge-secondary" data-toggle="modal" data-target="#competition">
  <span >Compétition</span></button>
<button type="button" class="badge badge-success" data-toggle="modal" data-target="#representation">
  <span >Représentation</span></button>
<button type="button" class="badge badge-danger" data-toggle="modal" data-target="#passageDeGrade">
    <span >Passage de grade</span></button>
<button type="button" class="badge badge-warning" data-toggle="modal" data-target="#stageDeCasse">
      <span >Stage de casse</span></button>
<button type="button" class="badge badge-info" data-toggle="modal" data-target="#entrainement">
        <span >Entraînement spécial</span></button>
<button type="button" class="badge badge-light" data-toggle="modal" data-target="#seminaire">
  <span >Séminaire d'été</span></button>
<button type="button" class="badge badge-dark" data-toggle="modal" data-target="#barbecue">
    <span >Barbecue de fin d'année</span></button>

</div>


<?php endif; ?>




        <div>
<p class="font-weight-bolder text-justify"><label for="eventDescription">Description de l'évènement :</label></p> <!--Pour le maxlenght du textarea, il ne commence qu'à 18 caractères. Il faut donc mettre le nombre souhaité +18-->
                <textarea id="eventDescription" name="newEventDescription" rows="5" cols="33" maxlength="2018">
                <?= (!empty($_POST['eventDescription']))? $_POST['eventDescription'] : $showUpdateEventResult[0]['eventDescription']?></textarea>
                <p class="card-text"><small class=" "><i>Max. 2000 caractères (~ 300 mots)<br /><br /></i></small></p>
</div>





<p><br /><button id="submitUpdateEventForm" type="submit" name="submitUpdateEventForm" class="police float-right rounded">Modifier</button></p>

</fieldset>
          </div>
</div>

<!-- Modal Tournoi -->
<div class="modal fade" id="tournoi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour un tournoi</h5>
        <button type="button" id="clear-button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
      <div class="col-md-4 col-12 mb-1">
      <input type="radio" id="tournoi01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="tournoi01.jpg" />
        <img src="affiches/tournoi01.jpg" alt="" class="w-86" />
</div>
<div class="col-md-4 col-12 mb-1">
        <input type="radio" id="tournoi02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="tournoi02.jpg" />
        <img src="affiches/tournoi02.jpg" alt="" class="w-86" />
</div>
<div class="col-md-4 col-12 mb-1">
        <input type="radio" id="tournoi03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="tournoi03.jpg" />
        <img src="affiches/tournoi03.jpg" alt="" class="w-86" />
</div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Compétition-->
<div class="modal fade" id="competition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour une compétition</h5>
        <button type="button" id="clear-button1" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="competition01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="competition01.jpg" />
        <img src="affiches/competition01.jpg" alt="" class="w-86" />
</div>
<div class="col-md-4 col-12 mb-1">
        <input type="radio" id="competition02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="competition02.jpg" />
        <img src="affiches/competition02.jpg" alt="" class="w-86" />
</div>
<div class="col-md-4 col-12 mb-1">
        <input type="radio" id="competition03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="competition03.jpg" />
        <img src="affiches/competition03.jpg" alt="" class="w-86" />
</div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Représentation-->
<div class="modal fade" id="representation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour une représentation</h5>
        <button type="button" id="clear-button2" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="representation01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="representation01.jpg" />
        <img class="w-86" src="affiches/representation01.jpg" alt="" />
        </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="representation02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="representation02.jpg" />
        <img class="w-86" src="affiches/representation02.jpg" alt="" />
        </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="representation03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="representation03.jpg" />
        <img class="w-86" src="affiches/representation03.jpg" alt="" />
        </div>
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Passage de grade-->
<div class="modal fade" id="passageDeGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour un passage de grade</h5>
        <button type="button" id="clear-button3" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row row">
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="passagedegrade01.jpg" />
        <img class="w-86" src="affiches/passagedegrade01.jpg" alt=""  />
        </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="passagedegrade02.jpg" />
        <img class="w-86" src="affiches/passagedegrade02.jpg" alt=""  />
        </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="passagedegrade03.jpg" />
        <img class="w-86" src="affiches/passagedegrade03.jpg" alt="" />
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Stage de casse-->
<div class="modal fade" id="stageDeCasse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour un stage de casse</h5>
        <button type="button" id="clear-button4" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <input type="radio" id="cassetuile01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="cassetuile01.jpg" />
        <img src="affiches/cassetuile01.jpg" alt="" class="w-86" />
        <input type="radio" id="cassetuile02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="cassetuile02.jpg" />
        <img src="affiches/cassetuile02.jpg" alt="" class="w-86" />
        <input type="radio" id="cassetuile03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="cassetuile03.jpg" />
        <img src="affiches/cassetuile03.jpg" alt="" class="w-86" />
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Entraînement spécial-->
<div class="modal fade" id="entrainement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour un entraînement spécial</h5>
        <button type="button" id="clear-button5" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <input type="radio" id="entrainement01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="entrainement01.jpg" />
        <img src="affiches/entrainement01.jpg" alt="" class="w-86" />
        <input type="radio" id="entrainement02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="entrainement02.jpg" />
        <img src="affiches/entrainement02.jpg" alt="" class="w-86" />
        <input type="radio" id="entrainement03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="entrainement03.jpg" />
        <img src="affiches/entrainement03.jpg" alt="" class="w-86" />
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Séminaire-->
<div class="modal fade" id="seminaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour le séminaire d'été</h5>
        <button type="button" id="clear-button6" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <input type="radio" id="seminaire01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="seminaire01.jpg" />
        <img src="affiches/seminaire01.jpg" alt="" class="w-86" />
        <input type="radio" id="seminaire02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="seminaire02.jpg" />
        <img src="affiches/seminaire02.jpg" alt="" class="w-86" />
        <input type="radio" id="seminaire03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="seminaire03.jpg" />
        <img src="affiches/seminaire03.jpg" alt="" class="w-86" />
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Barbecue-->
<div class="modal fade" id="barbecue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modèles d'affiches pour le barbecue de fin d'année</h5>
        <button type="button" id="clear-button7" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <input type="radio" id="barbecue01.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="barbecue01.jpg" />
        <img src="affiches/barbecue01.jpg" alt="" class="w-86" />
        <input type="radio" id="barbecue02.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="barbecue02.jpg" />
        <img src="affiches/barbecue02.jpg" alt="" class="w-86" />
        <input type="radio" id="barbecue03.jpg" name="<?= ( (!empty($showUpdateEventResult[0]['eventPicture'])) || (!empty($showUpdateEventResult[0]['registeredPicture']))) ? 'newRegisteredPicture' : 'firstRegisteredPicture' ?>" value="barbecue03.jpg" />
        <img src="affiches/barbecue03.jpg" alt="" class="w-86" />
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>





</form>

<div id="newEventEnd">

<div id="accordion" style="width: 30rem;" class="mx-auto">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0 text-center">
        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="mx-auto text-center text-align-center align-items-center police">Visualiser un aperçu</span>
        </button>
      </h5>
    </div>
</div>
</div>




















<?php
include '../view/templates/footerAdmin.php';
include '../view/templates/AlertInscription.php';
include '../view/templates/AlertConnection.php';
