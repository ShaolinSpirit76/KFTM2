<?php
require '../../controller/connexionControllerStart.php';
include '../templates/headHome.php';
include '../../controller/regex.php';
require '../../controller/connexionController.php';
?>


<style>
body {
    /* Code pour que l'image reste fixe et responsive */
    margin: 0;
    padding: 0;
    background: url(../../assets/images/theme/china-1760838_960_720.jpg) no-repeat center fixed;
    -webkit-background-size: cover;
    /* pour anciens Chrome et Safari */
    background-size: cover;
    /* version standardisée */
  }
</style>


<!-- Début modal login -->

<div id="connection" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header text-white" style="background-color:black;">
        <h5 class="modal-title">Connexion</h5>
        <a href="../../index.php"><button type="button" class="close text-white" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      <div class="modal-body">
<form id="loginForm" name="loginForm" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
  <div class="text-center">

  <span><label for="mailConnect">Identifiant </label><br /> <input class="<?php echo (isset($_POST['mailConnect']) && !preg_match($regexLogin, $_POST['mailConnect']))? 'red':'';  ?>" value="<?= $_POST['mailConnect']?>" type="text" name="mailConnect" id="mailConnect" placeholder="Pseudo ou mail" required /><p class="errorMessage"><?= (isset($error['errorLogin'])) ? $error['errorLogin'] : ''; ?></p></span>
  
  <span><label for="passwordConnect">Mot de passe  </label><br /> <input class="<?php echo (isset($_POST['passwordConnect']) && !preg_match($regexPassword, $_POST['passwordConnect']))? 'red':'';  ?>" value="<?= $_POST['passwordConnect']?>" type="password" name="passwordConnect" id="passwordConnect" placeholder="Mot de passe" required/><small class="text-muted"><br />Renseignés lors de votre inscription.</small><p class="errorMessage"><?= (isset($error['errorPassword'])) ? $error['errorPassword'] : ''; ?></p></span>

  <a href=""><small><u>Mot de passe oublié ?</u></small></a>

</div>

<a href="../../index.php"><button type="button" class="btn btn-secondary">Retour</button></a>
  <button id="loginButton" name="loginButton" type="submit" onclick="checkPasswordLogin();" class="yellow-hover btn btn-primary text-white">C'est parti !</button>
</form>
</div>
<div class="modal-footer" style="background-color:#282828;">
      <a href="../../view/form/inscriptionForm.php" class="mx-auto"><p><small><u>Pas encore inscrit ?</u></small></p></a>
        </div>
    </div>
    </div>
</div>

  <!-- Fin modal login -->








  <?php
require 'footerAdmin.php';
include 'AlertConnection.php';


  
