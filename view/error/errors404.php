<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/china-2090558_960_720.jpg) no-repeat center fixed;
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

#error404 {
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

<div class="card mx-auto" style="width: 30rem;" id="error404">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 404 ! Page introuvable... :(</h5>
    <p class="card-text text-justify"><br />L'accès à la ressource URL n'a pas été trouvé. Soit le fichier demandé n'a pas été publié, soit il est mal orthographié, soit il n'est pas placé dans le bon dossier.<br /><br />
Consultez le lien présent dans votre navigateur. L'erreur 404 est causée la plupart du temps par un problème d'orthographe ou d'emplacement du fichier recherché. Sinon, faites simplement un retour en arrière grâce à la flèche gauche de votre barre de navigation pour revenir de là d'où vous venez.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Retourner à l'accueil</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';