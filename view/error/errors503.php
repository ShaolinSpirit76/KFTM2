<?php
include '../templates/headHome.php';
?>

<style>
body {
  /* Code pour que l'image reste fixe et responsive */
  margin: 0;
  padding: 0;
  background: url(../../assets/images/error/chinese-mural-1158329_960_720.jpg) no-repeat center fixed;
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

#error503 {
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

<div class="card mx-auto" style="width: 30rem;" id="error503">
    <div class="card-body">
    <h5 class="card-title text-center color police">Erreur 503 ! Service temporairement indisponible ou en maintenance... :(</h5>
    <p class="card-text text-justify"><br />Le serveur est incapable de traiter la requête en raison d'une surcharge ou d'une maintenance du serveur.<br /><br />
    Cette erreur survient en cas de dépassement des quotas liés à la formule d'hébergement web choisie ou de maintenance en cours sur le serveur.<br /><br />
    Le service est alors réduit au minimum, ce qui rend indisponible le site web hébergé.<br /><br /></p>
<div class="text-center">
    <a href="../../index.php" class="btn btn-primary police">Nous serons bientôt de retour... :)</a>
</div>
  </div>
</div>

<?php
include '../templates/footerAdmin.php';