<?php
require_once '../../controller/myAccountControllerStart.php';
include '../templates/headHome.php';
require '../../controller/regexMyAccount.php';
require_once '../../controller/myAccountController.php';
?>


<div class="mx-auto">
<form method="POST" action="myAccount.php" id="IDForm" name="IDForm">
<div class="card mx-auto" id="update" style="width: 30rem;">
    <div class="card-body">
      

<p for="Identity" class="card-title police"><strong>4. Identifiants de connexion</strong><br /><br /></p>
<fieldset>
            <ul>

            
            <li class="font-weight-bolder   "><label for="userLog"><I>Identifiant : </I>
            <?= ($_SESSION['userInfos'][0]['userLog']) ?></label></li>

        <li class="font-weight-bolder   ">
          <button type="button" id="updateID" class="space badge badge-secondary" data-toggle="modal" data-target="#verification">Changer l'identifiant et/ou le mot de passe</button>
        </li>

        <div id="newID">

          <span class="font-weight-bolder"><label for="newUserLog">Nouvel identifiant </label><br />
            <input
              class="inputInscription <?php echo (isset($_POST['newUserLog']) && !preg_match($regexLogin, $_POST['newUserLog']))? 'red':'';  ?>"
              value="<?= (!empty($_POST['newUserLog']))? $_POST['newUserLog'] : $_SESSION['userInfos'][0]['userLog'] ?>" type="text" name="newUserLog" id="newUserLog"  /><small
              class="  "><br /><i>Vous pouvez tout simplement choisir votre adresse mail.</i></small>
            <p class="errorMessage"><?= (isset($error['errorLogin'])) ? $error['errorLogin'] : ''; ?></p><p class="errorMessage"><?= (isset($error['errorUserLogChecking'])) ? $error['errorUserLogChecking'] : ''; ?></p>
          </span>

          
                 <span class="font-weight-bolder"><label for="newPassword">Nouveau mot de passe </label><br />
            <input
              class="inputInscription <?php echo (isset($_POST['newPassword']) && !preg_match($regexPassword, $_POST['newPassword']))? 'red':'';  ?>"
              type="password" name="newPassword" id="newPassword" />
            <p class="errorMessage"><?= (isset($error['errorPassword'])) ? $error['errorPassword'] : ''; ?></p>
          </span>


          <span class="font-weight-bolder   "><label for="newConfirmPassword"><i>Confirmation * </i></label><br />
            <input
              class="inputInscription <?php echo (isset($_POST['newConfirmPassword']) && !preg_match($regexPassword, $_POST['newConfirmPassword']))? 'red':'';  ?>"
             type="password" name="newConfirmPassword" id="newConfirmPassword" />
            <p class="card-text"><small class="  "><i>Entre 8 et 15 caractères, contenant au moins une minuscule
                  et une majuscule, un chiffre et un caractère spécial.</i></small></p>
            <p class="errorMessage">
              <?= (isset($error['errorConfirmPassword'])) ? $error['errorConfirmPassword'] : ''; ?></p>
          </span>

        </div>

                </ul>

            </fieldset>

            <p><br /><a href="myAccount.php"><button class="updateBtn police float-left rounded">Retour</button></a>
            <button id="IDmodifRequest" type="submit" name="IDmodifRequest" class="updateBtn police float-right rounded">Enregistrer les
          modifications</button></p>
</div>
</div>

</form>
</div>



<!-- Début modal vérification de sécurité -->

<div class="modal fade" id="verification" tabindex="-1" role="dialog" aria-labelledby="verificationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header text-white" style="background-color:black;">
        <h5 class="modal-title red">Vérification requise</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- action : permet de désigner la page actuelle -->
<form name="secureForm" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
  <div class="text-center">

  <span><label for="passwordConnect">Mot de passe actuel </label><br /> <input class="<?php echo (isset($_POST['passwordConnect']) && !preg_match($regexPassword, $_POST['passwordConnect']))? 'red':'';  ?>" type="password" name="passwordConnect" id="passwordConnect" placeholder="Mot de passe" /><small class="text-muted"><br />Renseigné lors de votre inscription.</small><p class="errorMessage"><?= (isset($error['errorPassword'])) ? $error['errorPassword'] : ''; ?></p></span>

  <p><button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
  <button id="verificationButton" name="verificationButton" class="yellow-hover btn btn-primary">M'authentifier</button><br /></p>
</form>
</div>

<div class="modal-footer" style="background-color:#282828;">
      <small class="text-white"><i>Vous vous apprétez à modifier des données sensibles. Par mesure de sécurité, nous préférons vous re-demander votre mot de passe actuel, afin de nous assurer que l'auteur de la demande est bien le détenteur du compte.</i></small>
        </div>
    </div>
    </div>
</div>

  <!-- Fin modal vérification de sécurité -->


  

<?php
include '../templates/footerAdmin.php';
include '../templates/AlertInscription.php';
include '../templates/AlertConnection.php';