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
                <option value="Autre" <?= isset($_POST['eventType']) && $_POST['eventType'] == 'Autre' ? 'selected' : '' ?>>Autre </option>
</select>


      <input name="otherEventType" value="<?= isset($_POST['otherEventType']) && !empty($_POST['otherEventType']) ? $_POST['otherEventType'] : '' ?>" type="text" id="otherEventType" placeholder="Veuillez préciser..." />
</li>
</div>


<div id="eventCourse" class="space">
<li class="font-weight-bolder"> 
<label for="eventCourse">Groupe concerné : </label>

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


<?php if (!empty($showUpdateEventResult[0]['eventPicture'])): ?>
            
<label for="picture" class="font-weight-bolder">Affiche : </label>
 
  <a href="affiches/<?=$showUpdateEventResult[0]['eventPicture']?>" target="_blank" title="Cliquez pour agrandir"><img src="affiches/<?=$showUpdateEventResult[0]['eventPicture']?>" class="img-fluid rounded" alt="Affiche" width="15%" height="15%" /></a>
<?php
// Nous faisons un echo du nom de l'image
echo ($showUpdateEventResult[0]['eventPicture']) ?><br /><button type="button" class="badge badge-secondary" id="updatePicture">Changer l'affiche</button>
    
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
<span class="font-weight-bolder"><label for="newEventPicture">Nouvelle affiche : </label> <input type="file" name="newEventPicture" id="newEventPicture"/>
  <small><br /><i>Un .jpg, c'est mieux ;)</i></small></span>

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

<label for="firstPicture">Ajouter une affiche : </label> <input
type="file" name="firstPicture" id="firstPicture" />
<small><br /><i>Un .jpg, c'est mieux ;)</i></small>


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
