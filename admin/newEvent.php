<?php
require '../controller/newEventControllerStart.php';
require '../controller/adminController.php';
require_once '../controller/newEventController.php';
include '../controller/regex.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>




<!-- Début formulaire d'inscription -->

<div id="newEventTitle" class="col-md-10 col-lg-5 col-sm-10 offset-sm-1 col mx-auto">
<h1 class="police text-white text-center">Créer un nouvel évènement</h1>
</div>

<form method="POST" action="newEvent.php" id="newEventForm" name="newEventForm" 
enctype="multipart/form-data" class="police2">
               <div class="card mx-auto" id="generation" style="width: 31rem;">
  <div class="card-body">
      <fieldset>


<div class="space">
      <li class="font-weight-bolder">
          
      <label for="eventType">Nom de l'évènement : </label>
      <select id="eventType" name="eventType" class="inputNewEvent" value="<?= $_POST['eventType']?>" required>
            <option value="<?= $_POST['eventType']?>" selected disabled>Choisissez</option>
                <option value="Tournoi">Tournoi</option> 
                <option value="Compétition">Compétition</option>
                <option value="Représentation">Représentation</option>
                <option value="Passage de grade">Passage de grade</option>
                <option value="Stage de casse">Stage de casse</option>
                <option value="Entraînement spécial">Entraînement spécial</option>
                <option value="Séminaire d'été">Séminaire d'été</option>
                <option value="Barbecue de fin d'année">Barbecue de fin d'année</option>
                <option value="Autre">Autre </option>
</select>
      <input name="otherEventType" type="text" id="otherEventType" placeholder="Veuillez préciser..." />
</li>
</div>


<div id="eventCourse" class="space">
<li class="font-weight-bolder"> 
<label for="eventCourse" value="<?= $_POST['eventCourse']?>">Groupe concerné : </label>

  <p><input type="radio" id="Kung-Fu" name="eventCourse" value="Kung-Fu">
  <label for="Kung-Fu">Kung-Fu <span class="formColor">~~~</span> </label>

  <input type="radio" id="Taïchi Chuan & Qi Gong" name="eventCourse" value="Taïchi Chuan & Qi Gong">
  <label for="Taïchi Chuan & Qi Gong">Taïchi <span class="formColor">~~~</span> </label>

  <input type="radio" id="Sanda & Shoubo" name="eventCourse" value="Sanda & Shoubo">
  <label for="Sanda & Shoubo">Sanda <span class="formColor">~~~</span> </label>

  <input type="radio" id="Tout le monde" name="eventCourse" value="Tout le monde">
  <label for="Tout le monde">Tous</label></p>
    
            
            </li>
</div>


<div class="space">

<li class="font-weight-bolder"><label for="eventDate">Date de l'évènement : </label> <input class="inputNewEvent" value="<?= $_POST['eventDate']?>" type="date" name="eventDate" id="eventDate" placeholder="jj/mm/aaaa" required  /></li>

</div>

<div class="space">

<li class="font-weight-bolder"><label for="eventHour">Heure : </label> <input class="inputNewEvent" value="<?= $_POST['eventHour']?>" type="time" name="eventHour" id="eventHour" required /></li>

</div>

<div class="space">

<li class="font-weight-bolder"><label for="eventMaxUser">Nombre de participants maximal : </label> <input class="inputNewEvent" value="<?= $_POST['eventMaxUser']?>" type="number" min="1" max="100" name="eventMaxUser" id="eventMaxUser" /></li>

</div>



<!-- Code pour upload la photo de profil. On ne récupère que le nom dans la BDD -->
<!-- Pour que l'image se copie dans le dossier prévu à cet effet, il faut ajouter
une ligne de commande dans le terminal : sudo chmod 777 affiches/ -->
<?php 
// on test si un fichier a été sélectionné en upload
if ( (isset($_FILES['eventPicture']['tmp_name'])) && (!empty($_FILES['eventPicture']['tmp_name'])) ) { 
  // $taille est un Array contenant les infos de l'image
  $taille = getimagesize($_FILES['eventPicture']['tmp_name']); 

  // on récupère la largeur et la hauteur de l'image
  $largeur = $taille[0]; 
  $hauteur = $taille[1];

  // Transformation selon les besoins de la miniature
  $largeur_miniature = 300;
  $hauteur_miniature = $hauteur / $largeur * 300;

  $im = imagecreatefromjpeg($_FILES['eventPicture']['tmp_name']);
  $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
  
  imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
  
  imagejpeg($im_miniature, 'affiches/'.$_FILES['eventPicture']['name'], 90);
  
}

                  ?>

<div class="space">
                 
                 <li class="font-weight-bolder space"> <label for="eventPicture">Affiche de l'évènement : </label>
        <input type="file" name="eventPicture" id="eventPicture" />
        <small><i><br />Un .jpg, c'est mieux ;)</i></small>
</div>



        <div>
<p class="font-weight-bolder text-justify"><label for="eventDescription">Description de l'évènement :</label></p> <!--Pour le maxlenght du textarea, il ne commence qu'à 18 caractères. Il faut donc mettre le nombre souhaité +18-->
                <textarea id="eventDescription" name="eventDescription" rows="5" cols="33" maxlength="2018" value="<?= $_POST['eventDescription']?>"></textarea>
                <p class="card-text"><small class=" "><i>Max. 2000 caractères (~ 300 mots)<br /><br /></i></small></p>
</div>





<p><br /><button id="submitNewEventForm" type="submit" name="submitNewEventForm" class="police float-right rounded">Créer</button></p>

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
