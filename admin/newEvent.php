<?php
require '../controller/newEventControllerStart.php';
require '../controller/adminController.php';
require_once '../controller/newEventController.php';
include '../controller/regex.php';
include '../view/templates/headHome.php';
include 'navbarAdmin.php';
?>
<!-- Début formulaire d'inscription -->

<div id="newEventTitle">
<h1 class="police text-center space text-white font-weight-bolder">Créer un nouvel évènement</h1>
</div>

<form method="POST" action="newEvent.php" id="inscriptionForm" name="inscriptionForm" enctype="multipart/form-data" class="police2 container-fluid text-center">

<fieldset>

<div class="space">      
          
      <div class="form-group font-weight-bolder text-white"><label for="eventType"><p>Nom de l'évènement : </p></label>
      <!-- La value permet de conserver la valeur de l'input au cas où le formulaire ne passe pas -->
      <select id="eventType" name="eventType" class="inputNewEvent form-control mx-auto" value="<?= $_POST['eventType']?>" required>
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
</select></div>
<div class="form-group font-weight-bolder text-white"><input name="otherEventType" type="text" id="otherEventType" placeholder="Veuillez préciser..." /></div>

</div>

<div id="eventCourse" class="space">
<fieldset class="form-group font-weight-bolder text-white">

<legend class="col-form-label col-sm-2 pt-0 mx-auto">Groupe concerné : </legend>
<div class="row">
<div class="col-sm-10 offset-sm-1 text-center">

<div class="form-check">
  <input type="radio" class="form-check-input" id="Kung-Fu" name="eventCourse" value="Kung-Fu">
  <label class="form-check-label text-center" for="Kung-Fu">Kung-Fu</label>
</div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="Taïchi Chuan & Qi Gong" name="eventCourse" value="Taïchi Chuan & Qi Gong">
  <label class="form-check-label" for="Taïchi Chuan & Qi Gong">Taïchi</label>
</div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="Sanda & Shoubo" name="eventCourse" value="Sanda & Shoubo">
  <label class="form-check-label" for="Sanda & Shoubo">Sanda</label>
</div>

<div class="form-check">
  <input type="radio" class="form-check-input" id="Tout le monde" name="eventCourse" value="Tout le monde">
  <label class="form-check-label" for="Tout le monde">Tous</label>
</div>

</div>

</div>
</fieldset>         
</div>

<div class="space">

<div class="form-group font-weight-bolder text-white"><label for="eventDate">Date de l'évènement : </label> <input class="inputNewEvent form-control mx-auto" value="<?= $_POST['eventDate']?>" type="date" name="eventDate" id="eventDate" placeholder="jj/mm/aaaa" required  /></div>

</div>

<div class="space">

<div class="form-group font-weight-bolder text-white"><label for="eventHour">Heure : </label> <input class="inputNewEvent form-control mx-auto" value="<?= $_POST['eventHour']?>" type="time" name="eventHour" id="eventHour" required />
</div>

</div>

<div class="space">

<div class="form-group font-weight-bolder text-white"><label for="eventMaxUser">Nombre de participants maximal : </label> <input class="inputNewEvent form-control mx-auto" value="<?= $_POST['eventMaxUser']?>" type="number" min="1" max="100" name="eventMaxUser" id="eventMaxUser" />
</div>

</div>

<!-- Code pour upload la photo de profil. On ne récupère que le nom dans la BDD -->
<!-- Pour que l'image se copie dans le dossier prévu à cet effet, il faut ajouter
une ligne de commande dans le terminal : sudo chmod 777 affiches/ -->
<?php 
// on teste si un fichier a été sélectionné en upload
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

<div class="form-group font-weight-bolder text-white space"> <label for="pictureChoice">Ajouter une affiche : </label>
<input type="button" class="mx-auto" id="personalPictureChoice" value="Personnelle" />
  
  <input type="button" class="mx-auto" id="registeredPictureChoice" value="Modèles pré-enregistrés" />
</div>

<div id="personalPicture" class="space">
                 
<div class="form-group font-weight-bolder text-white space"> <label for="eventPicture">Affiche de l'évènement : </label>
        <input type="file" class="form-control-file mx-auto text-center" name="eventPicture" id="eventPicture" />
</div>
        <small><i><br />Un .jpg, c'est mieux ;)</i></small>
</div>

<div id="registeredPicture" class="space">

<div class="form-group font-weight-bolder text-white space"> <label for="registeredPicture">Affiche de l'évènement : </label>

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

<div class="form-group font-weight-bolder text-white text-justify">
<div class="col-sm-10 offset-sm-1 text-center">
<label for="eventDescription">Description de l'évènement :</label> <!--Pour le maxlenght du textarea, il ne commence qu'à 18 caractères. Il faut donc mettre le nombre souhaité +18-->
                <textarea id="eventDescription" class="form-control" name="eventDescription" rows="5" cols="33" maxlength="2018" value="<?= $_POST['eventDescription']?>"></textarea>
                <p class="card-text"><small class=" "><i>Max. 2000 caractères (~ 300 mots)<br /><br /></i></small></p>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<p><br /><button id="submitNewEventForm" type="submit" name="submitNewEventForm" class="police float-right rounded">Créer</button></p>
</div>
</div>               
                

</fieldset>




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
      <input type="radio" id="tournoi01.jpg"  name="registeredPicture"    value="tournoi01.jpg" />
        <img src="affiches/tournoi01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="tournoi02.jpg"  name="registeredPicture"    value="tournoi02.jpg" />
        <img src="affiches/tournoi02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="tournoi03.jpg"  name="registeredPicture"    value="tournoi03.jpg" />
        <img src="affiches/tournoi03.jpg"   alt="" class="w-86"   />
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
        <input type="radio" id="competition01.jpg"  name="registeredPicture"    value="competition01.jpg" />
        <img src="affiches/competition01.jpg"   alt="" class="w-86" />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="competition02.jpg"  name="registeredPicture"    value="competition02.jpg" />
        <img src="affiches/competition02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="competition03.jpg"  name="registeredPicture"    value="competition03.jpg" />
        <img src="affiches/competition03.jpg"   alt="" class="w-86"   />
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
        <input type="radio" id="representation01.jpg"  name="registeredPicture"    value="representation01.jpg" />
        <img src="affiches/representation01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="representation02.jpg"  name="registeredPicture"    value="representation02.jpg" />
        <img src="affiches/representation02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="representation03.jpg"  name="registeredPicture"    value="representation03.jpg" />
        <img src="affiches/representation03.jpg"   alt="" class="w-86"   />
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
      <div class="modal-body row">
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade01.jpg"  name="registeredPicture"    value="passagedegrade01.jpg" />
        <img src="affiches/passagedegrade01.jpg"   alt="" class="w-86"   />
      </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade02.jpg"  name="registeredPicture"    value="passagedegrade02.jpg" />
        <img src="affiches/passagedegrade02.jpg"   alt="" class="w-86"   />
        </div>
        <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="passagedegrade03.jpg"  name="registeredPicture"    value="passagedegrade03.jpg" />
        <img src="affiches/passagedegrade03.jpg"   alt="" class="w-86"   />
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
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="cassetuile01.jpg"  name="registeredPicture"    value="cassetuile01.jpg" />
        <img src="affiches/cassetuile01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="cassetuile02.jpg"  name="registeredPicture"    value="cassetuile02.jpg" />
        <img src="affiches/cassetuile02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="cassetuile03.jpg"  name="registeredPicture"    value="cassetuile03.jpg" />
        <img src="affiches/cassetuile03.jpg"   alt="" class="w-86"   />
      </div>
        
          
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
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="entrainement01.jpg"  name="registeredPicture"    value="entrainement01.jpg" />
        <img src="affiches/entrainement01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="entrainement02.jpg"  name="registeredPicture"    value="entrainement02.jpg" />
        <img src="affiches/entrainement02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="entrainement03.jpg"  name="registeredPicture"    value="entrainement03.jpg" />
        <img src="affiches/entrainement03.jpg"   alt="" class="w-86"   />
      </div>
        
          
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
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="seminaire01.jpg"  name="registeredPicture"    value="seminaire01.jpg" />
        <img src="affiches/seminaire01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="seminaire02.jpg"  name="registeredPicture"    value="seminaire02.jpg" />
        <img src="affiches/seminaire02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="seminaire03.jpg"  name="registeredPicture"    value="seminaire03.jpg" />
        <img src="affiches/seminaire03.jpg"   alt="" class="w-86"   />
      </div>
        
          
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
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="barbecue01.jpg"  name="registeredPicture"    value="barbecue01.jpg" />
        <img src="affiches/barbecue01.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="barbecue02.jpg"  name="registeredPicture"    value="barbecue02.jpg" />
        <img src="affiches/barbecue02.jpg"   alt="" class="w-86"   />
      </div>
      <div class="col-md-4 col-12 mb-1">
        <input type="radio" id="barbecue03.jpg"  name="registeredPicture"    value="barbecue03.jpg" />
        <img src="affiches/barbecue03.jpg"   alt="" class="w-86"   />
      </div>
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Choisir</button>
      </div>
    </div>
  </div>
</div>



</form>

<?php
include '../view/templates/footerAdmin.php';
include '../view/templates/AlertInscription.php';
