<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/tea-set-2064506_960_720.jpg) no-repeat center fixed;
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

#error504 {
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

<div class="card mx-auto" style="width: 30rem;" id="error504">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 504 ! Temps d'attente expiré... :(</h5>
    <p class="card-text text-justify"><br />Le temps d'attente pour accéder à la passerelle est expiré.<br /><br />
    Cette erreur peut apparaitre si plusieurs serveurs sont utilisés pour accéder à une page. Le premier serveur fonctionne normalement mais le serveur de destination ne répond pas.<br /><br />
    Ce problème peut également être lié à une surcharge du serveur. Vous pouvez essayer de renouveller la page, ou revenir plus tard.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Retourner à l'accueil</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';