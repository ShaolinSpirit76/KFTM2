<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/laughing-buddha-1876038_960_720.jpg) no-repeat center fixed;
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

#error502 {
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

<div class="card mx-auto" style="width: 30rem;" id="error502">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 502 ! Mauvaise passerelle d’accès... :(</h5>
    <p class="card-text text-justify"><br />La réponse envoyée à un serveur intermédiaire par un autre serveur est incorrecte. En agissant en tant que serveur proxy ou passerelle, le serveur a reçu une réponse invalide depuis le serveur distant.<br /><br />
    Cette erreur est souvent causée par un problème de réseau entre les serveurs. Une simple actualisation de la page suffit alors à la résoudre.<br /><br />
Ou vous pouvez simplement faire un retour en arrière grâce à la flèche gauche de votre barre de navigation pour revenir de là d'où vous venez.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Retourner à l'accueil</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';