<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/china-2097075_960_720.jpg) no-repeat center fixed;
  -webkit-background-size: cover;
  /* pour anciens Chrome et Safari */
  background-size: cover;
  /* version standardisée */
}

.img-fluid {
  /* A utiliser avec class="img-fluid" à appliquer à chaque image déclarée dans le html, pour que toutes les images soient responsives */
  max-width: 100%;
  height: auto;
}

#error500 {
    margin-top: 3rem;
    background-color: rgba(255, 255, 255, 0.60);
}

.color{
    color: #336699;
}

.police {
    font-family: 'Permanent Marker', cursive;
}
</style>

<div class="card mx-auto" style="width: 30rem;" id="error500">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 500 ! Erreur interne du serveur... :(</h5>
    <p class="card-text text-justify"><br />Le serveur a rencontré une condition inattendue, l'empêchant de satisfaire à votre demande. Le serveur ne peut alors pas être plus précis concernant la raison de l'erreur.<br /><br />
    Dans la plupart des cas, cette erreur n'indique pas un problème avec le serveur lui-même, mais plutôt un problème avec les instructions que le serveur a reçu ou qu'il a été chargé d'afficher.
Cette erreur est donc souvent due à un problème avec le site web hébergé en lui-même.<br /><br />
Vous pouvez simplement faire un retour en arrière grâce à la flèche gauche de votre barre de navigation pour revenir de là d'où vous venez.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Retourner à l'accueil</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';