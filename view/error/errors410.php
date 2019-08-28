<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/illustration-2246804_960_720.jpg) no-repeat center fixed;
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

#error410 {
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

<div class="card mx-auto" style="width: 30rem;" id="error410">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 410 ! Cette page nous a quitté... :(</h5>
    <p class="card-text text-justify"><br />La page n’existe plus (sous-entendu c’est voulu et ça ne reviendra probablement pas).<br /><br />
    La ressource n'est plus disponible et aucune adresse de redirection n’est connue. Vous pouvez simplement faire un retour en arrière grâce à la flèche gauche de votre barre de navigation pour revenir de là d'où vous venez.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Retourner à l'accueil</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';