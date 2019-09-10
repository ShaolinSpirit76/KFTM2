<?php
require_once '../../controller/inscriptionFormControllerStart.php';
include '../templates/head.php';
include '../../controller/regex.php';
require_once '../../controller/inscriptionFormController.php';
?>

<!-- Début formulaire d'inscription -->


<div id="inscriptionTitle">
<h1 id="legend1" class="text-center">Inscription</h1>
<p class="text-center police2 space"><small>* champs obligatoires</small></p>
</div>


<form method="POST" action="inscriptionForm.php" id="inscriptionForm" name="inscriptionForm" enctype="multipart/form-data" class="police2 container-fluid text-center">

<fieldset>

<p for="Identity" class="police text-white card-title"><strong>1. Identité</strong><br /><br /></p>

<div class="form-group text-white font-weight-bolder"><label for="gender">Genre * : </label>
            <select name="gender" class="inputInscription form-control mx-auto" required>
            <option value="" selected disabled>Choisissez</option>
                <option value="Femme">Femme</option> 
                <option value="Homme">Homme</option>
  </select></div>

  <div class="form-group text-white font-weight-bolder"><label for="lastName">Nom * : </label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['lastName']) && !preg_match($regexName, $_POST['lastName']))? 'red':'';  ?>" value="<?= $_POST['lastName']?>" id="lastName" type="text" name="lastName" placeholder="Nom" required /><p class="errorMessage"><?= (isset($error['errorLastName'])) ? $error['errorLastName'] : ''; ?></p></div>

  <div class="form-group text-white font-weight-bolder"><label for="firstName">Prénom * : </label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['firstName']) && !preg_match($regexName, $_POST['firstName']))? 'red':'';  ?>" value="<?= $_POST['firstName']?>" id="firstName" type="text" name="firstName" placeholder="Prénom" required /><p class="errorMessage"><?= (isset($error['errorFirstName'])) ? $error['errorFirstName'] : ''; ?></p></div>

  <div class="form-group text-white font-weight-bolder"><label for="birthDate">Date de naissance : </label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['birthDate']) && !preg_match($regexDate, date('d/m/Y',strtotime($_POST['birthDate']) )))? 'red':'';  ?>" value="<?= $_POST['birthDate']?>" type="date" name="birthDate" id="birthDate" placeholder="jj/mm/aaaa"  /><p class="errorMessage"><?= (isset($error['errorBirthDate'])) ? $error['errorBirthDate'] : ''; ?></p></div>

  <!-- Code pour upload la photo de profil. On ne récupère que le nom dans la BDD -->
  <?php 
// on test si un fichier a été sélectionné en upload
if ( (isset($_FILES['picture']['tmp_name'])) && (!empty($_FILES['picture']['tmp_name'])) ) { 
  // $taille est un Array contenant les infos de l'image
  $taille = getimagesize($_FILES['picture']['tmp_name']); 

  // on récupère la largeur et la hauteur de l'image
  $largeur = $taille[0]; 
  $hauteur = $taille[1];

  // Transformation selon les besoins de la miniature
  $largeur_miniature = 300;
  $hauteur_miniature = $hauteur / $largeur * 300;

  $im = imagecreatefromjpeg($_FILES['picture']['tmp_name']);
  $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
  
  imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
  
  imagejpeg($im_miniature, 'miniatures/'.$_FILES['picture']['name'], 90);
  
}
 ?>
                 
                 <div class="form-group text-white font-weight-bolder space"><label for="picture">Photo de profil : </label>
        <input class="form-control-file mx-auto text-center" type="file" name="picture" id="picture" />
        <small><i><br />Nous n'acceptons que les .jpg</i></small></div>

</fieldset>

<p for="contactInformation" class="police card-title text-white"><strong>2. Coordonnées</strong><br /><br /></p>

<fieldset>


<div class="form-group text-white font-weight-bolder"><label for="mail">Adresse mail * : </label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['mail']) && !preg_match($regexMail, $_POST['mail']))? 'red':'';  ?>" type="text" id="mail" name="mail" placeholder="julie.dupont@exemple.com" value="<?= $_POST['mail']?>" required /><p class="errorMessage"><?= (isset($error['errorMail'])) ? $error['errorMail'] : ''; ?></p><p class="errorMessage"><?= (isset($error['errorMailChecking'])) ? $error['errorMailChecking'] : ''; ?></p></div>

<div class="form-group text-white font-weight-bolder space"><label for="phoneNumber">Numéro de téléphone : </label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['phoneNumber']) && !preg_match($regexPhone, $_POST['phoneNumber']))? 'red':'';  ?>" value="<?= $_POST['phoneNumber']?>" type="tel" id="phoneNumber" name="phoneNumber" placeholder=" 06.xx.xx.xx.xx " /><p class="errorMessage"><?= (isset($error['errorPhone'])) ? $error['errorPhone'] : ''; ?></p></div>

</fieldset>

<p for="Identity" class="police text-white card-title"><strong>3. Identifiants de connexion</strong><br /><br /></p>

<fieldset>
            
            <div class="form-group text-white font-weight-bolder"><label for="userLog"><I>Identifiant * : </I></label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['userLog']) && !preg_match($regexLogin, $_POST['userLog']))? 'red':'';  ?>" value="<?= $_POST['userLog']?>" type="text" name="userLog" id="userLog" placeholder="Pseudo ou mail" required /><small class=" "><br /><i>Vous pouvez tout simplement choisir votre adresse mail.</i></small>
            <p class="errorMessage"><?= (isset($error['errorLogin'])) ? $error['errorLogin'] : ''; ?></p><p class="errorMessage"><?= (isset($error['errorUserLogChecking'])) ? $error['errorUserLogChecking'] : ''; ?></p></div>

<div class="form-group text-white font-weight-bolder"><label for="password"><I>Mot de passe * : </I></label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['password']) && !preg_match($regexPassword, $_POST['password']))? 'red':'';  ?>" type="password" name="password" id="password" required/><p class="errorMessage"><?= (isset($error['errorPassword'])) ? $error['errorPassword'] : ''; ?></p></div>

<div class="form-group text-white font-weight-bolder space"><label for="confirmPassword"><I>Confirmation * : </I></label> <input class="inputInscription form-control mx-auto <?php echo (isset($_POST['confirmPassword']) && !preg_match($regexPassword, $_POST['confirmPassword']))? 'red':'';  ?>" type="password" name="confirmPassword" id="confirmPassword" required/>
    <p class="card-text"><small class=" "><i>Entre 8 et 15 caractères, contenant au moins une minuscule et une majuscule, un chiffre et un caractère spécial.</i></small></p><p class="errorMessage"><?= (isset($error['errorConfirmPassword'])) ? $error['errorConfirmPassword'] : ''; ?></p></div>

                
            </fieldset>

            <p for="statut" class="police text-white card-title"><strong>4. Statut  </strong><br /><br /></p>
<fieldset>
            

    <div id="status" class="space">

<fieldset class="form-group font-weight-bolder">
    <div class="row">
<legend class="col-form-label col-sm-2 pt-0 text-white">Rang : </legend>

<div class="col-sm-10">

        <div class="form-check">
  <input class="form-check-input" type="radio" id="élève" name="status" value="élève">
  <label class="form-check-label text-white" for="élève">Élève</label>
  </div>

        <div class="form-check">
  <input class="form-check-input" type="radio" id="maître" name="status" value="maître">
  <label class="form-check-label text-white" for="maître">Maître</label>
  </div>

        <div class="form-check">
  <input class="form-check-input" type="radio" id="maître_et_élève" name="status" value="maître et élève">
  <label class="form-check-label text-white" for="maître et élève">Maître et élève</label>
  </div>

</div>

</div>
</fieldset>

</div>

<div id="studentCourse" class="space">

<div class="form-group font-weight-bolder text-white"><label for="studentCourse">Discipline (élève) : </label>
            <select name="studentCourse" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>
                <option value="Kung-Fu">Kung-Fu</option> 
                <option value="Taïchi Chuan & Qi Gong">Taïchi Chuan & Qi Gong</option>
                <option value="Sanda & Shoubo">Sanda & Shoubo</option>
</select></div>

</div>

<div id="teacherCourse" class="space">

<div class="form-group text-white font-weight-bolder"><label for="teacherCourse">Cours (maître) : </label>
            <select name="teacherCourse" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>
                <option value="Kung-Fu">Kung-Fu</option> 
                <option value="Taïchi Chuan & Qi Gong">Taïchi Chuan & Qi Gong</option>
                <option value="Sanda & Shoubo">Sanda & Shoubo</option>
</select></div>

</div>

<div id="groupAge" class="space">

<fieldset class="form-group font-weight-bolder text-white">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Groupe : </legend>

      <div class="col-sm-10">
        <div class="form-check">
  <input class="form-check-input" type="radio" id="Enfants" name="groupAge" value="Enfants">
  <label class="form-check-label" for="Enfants">Enfants</label>
  </div>

        <div class="form-check">
  <input class="form-check-input" type="radio" id="Ados" name="groupAge" value="Ados">
  <label class="form-check-label" for="Ados">Ados</label>
  </div>

        <div class="form-check">
  <input class="form-check-input" type="radio" id="Adultes" name="groupAge" value="Adultes">
  <label class="form-check-label" for="Adultes">Adultes</label>
</div>

</div>
        
</div>
</fieldset>

</div>

<div id="studentYear" class="space">

<div class="form-group font-weight-bolder text-white"><label for="studentYear">Année : </label>
            <select name="studentYear" id="studentYear" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>
                <option value="1ère année">1ère</option> 
                <option value="2ème année">2ème</option>
                <option value="3ème année">3ème</option>
                <option value="4ème année">4ème</option> 
                <option value="5ème année">5ème</option>
                <option value="6ème année">6ème</option>
                <option value="7ème année">7ème</option> 
                <option value="8ème année">8ème</option>
                <option value="9ème année">9ème</option>
                <option value="10ème année">10ème</option> 
                <option value="Vétéran">Vétéran</option>
          </select></div>

</div>

<div id="childBelt" class="space">

          <div class="form-group font-weight-bolder text-white"><label for="childBelt">Ceinture : </label>
            <select name="childBelt" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>

            <optgroup label="Blanche - Grue">
            <option value="Ceinture blanche-Grue">Grue</option>
                <option value="Ceinture blanche-Grue 1ère barrette">Grue - 1ère barrette</option> 
                <option value="Ceinture blanche-Grue 2ème barrette">Grue - 2ème barrette</option>
                <option value="Ceinture blanche-Grue 3ème barrette">Grue - 3ème barrette</option>
            <optgroup label="Jaune - Dragon">
            <option value="Ceinture jaune-Dragon">Dragon</option>
                <option value="Ceinture jaune-Dragon 1ère barrette">Dragon - 1ère barrette</option> 
                <option value="Ceinture jaune-Dragon 2ème barrette">Dragon - 2ème barrette</option>
                <option value="Ceinture jaune-Dragon 3ème barrette">Dragon - 3ème barrette</option>
            <optgroup label="Rouge - Tigre">
              <option value="Ceinture rouge-Tigre">Tigre</option>
              <option value="Ceinture rouge-Tigre 1ère barrette">Tigre - 1ère barrette</option> 
                <option value="Ceinture rouge-Tigre 2ème barrette">Tigre - 2ème barrette</option>
                <option value="Ceinture rouge-Tigre 3ème barrette">Tigre - 3ème barrette</option>

          </select></div>

</div>

<div id="studentBelt" class="space">

          <div class="form-group font-weight-bolder text-white"><label for="studentBelt">Ceinture : </label>
            <select name="studentBelt" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>
            <optgroup label="Blanche">
            <option value="Ceinture blanche">Blanche</option>
                <option value="Ceinture blanche 1ère barrette">Blanche - 1ère barrette</option> 
                <option value="Ceinture blanche 2ème barrette">Blanche - 2ème barrette</option>
                <option value="Ceinture blanche 3ème barrette">Blanche - 3ème barrette</option>
                <option value="Ceinture blanche 4ème barrette">Blanche - 4ème barrette</option> 
            <optgroup label="Jaune">
            <option value="Ceinture jaune">Jaune</option>
                <option value="Ceinture jaune 1ère barrette">Jaune - 1ère barrette</option> 
                <option value="Ceinture jaune 2ème barrette">Jaune - 2ème barrette</option>
            <optgroup label="Rouge">
              <option value="Ceinture rouge">Rouge</option>
                <option value="Ceinture rouge 1ère barrette">Rouge - 1ère barrette</option>
                <optgroup label="Noire">
              <option value="Ceinture noire">Noire</option>
              <option value="1er DAN">1er DAN</option>
              <option value="2ème DAN">2ème DAN</option>
              <option value="3ème DAN">3ème DAN</option>
              <option value="4ème DAN">4ème DAN</option>
              <option value="5ème DAN">5ème DAN</option>
              <option value="6ème DAN">6ème DAN</option>
          </select></div>

</div>

<div id="teacherRank" class="space">

          <div class="form-group font-weight-bolder text-white"><label for="teacherRank">Grade : </label>
            <select name="teacherRank" class="inputInscription form-control mx-auto">
            <option value="" selected disabled>Choisissez</option>
                <option value="Sisook/8">Sisook</option>
                <option value="Simui/7">Simui</option>
                <option value="Sibak/6">Sibak</option>
                <option value="Jiaoshe/5">Jiaoshe</option> 
                <option value="Taïjiaoshe/4">Taïjiaoshe</option>
                <option value="Laoshe/3">Laoshe</option>
                <option value="Taïlaoshe/2">Taïlaoshe</option> 
                <option value="" selected disabled>Sifu - Jean-Marie Levray</option> 
                <option value="" selected disabled>Taïsifu</option>
                <option value="" selected disabled>Sikung - Jean-Paul Cabrol</option>
                <option value="" selected disabled>Sijo - Michel Person N'Guyen</option>
</select></div>

</div>

<div class="form-group font-weight-bolder text-justify text-white"><label for="presentation">Un slogan, une citation préférée, ou tout simplement votre parcours dans les arts martiaux ? Dites-nous en plus !</label></p> <!--Pour le maxlenght du textarea, il ne commence qu'à 18 caractères. Il faut donc mettre le nombre souhaité +18-->
                <textarea class="form-control" id="presentation" name="presentation" rows="5" cols="33" maxlength="518"></textarea>
                <p class="card-text"><small class=" "><i>Max. 500 caractères<br /><br /></i></small></p>
</div>

<div class="form-group font-weight-bolder text-justify text-white"><label for="teacherRank">Afficher dès à présent votre profil parmi les membres de l'école visibles sur le site (modifiable à tout moment dans la page "Mon compte") ?</label>
<!-- Bouton switch on/off -->
  <div class="onoffswitch">
    <input type="checkbox" name="showProfil" class="onoffswitch-checkbox form-check-input" id="myonoffswitch" />
    <label class="onoffswitch-label form-check-label" for="myonoffswitch">
      <span class="onoffswitch-inner"></span>
      <span class="onoffswitch-switch"></span>
    </label>
  </div>
</div>

<div class="form-group">
<label for="checkForm" class="font-weight-bolder form-check-label text-white">Je certifie sur l'honneur l'exactitude des informations renseignées ci-dessus. *</label><br />
<input class="form-check-input" type="checkbox" id="checkForm" name="checkForm" value="checkForm" required />
<br /><br />
<div class="g-recaptcha" id="recaptcha" data-sitekey="6Leno7MUAAAAAMZSGnEvxMzJCw-k7fX556kdwqUz">
          </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
<p><br /><button id="submitInscriptionForm" type="submit" name="submitInscriptionForm" class="police float-right rounded">Valider</button></p>
</div>
</div>




</fieldset>
</form>



<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0 text-center">
      <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="mx-auto text-center text-align-center align-items-center">En savoir plus sur la gestion de vos données</span>
        </button>
      </h2>
    </div>
</div>
<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body text-justify">
      Nous vous garantissons que les informations renseignées ci-dessus sont recueillies par le maître de l'école (Sifu Jean-Marie) dans le seul objectif d'en simplifier la gestion.<br /> Par ailleurs, elles permettent également d'améliorer votre expérience sur le site de l'école, en tant que membre.<br /><br /> En aucun cas vos coordonnées personnelles ne seront sciemment communiquées à une personne ou une entité tierce ; Sifu Jean-Marie et le webmaster prennent la confidentialité des membres du cercle très au sérieux.<br /><br /> Vous pourrez choisir vous-mêmes les informations que vous souhaitez afficher sur le site en vous rendant sur la page "Mon compte" de l'onglet "Connexion".<br /><br />Si vous souhaitez en savoir plus sur la protection et l'utilisation de vos données, n'hésitez pas à visiter nos mentions légales situées en bas de page, notamment les <a href="../mentions/legalInfos.php">informations légales</a> du site et notre <a href="../mentions/RGPD.php">RGPD</a>.
      </div>
    </div>
</div>




<!-- Fin formulaire d'inscription -->

<?php
include '../templates/footer.php';
include '../templates/AlertInscription.php';

