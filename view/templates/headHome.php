<!DOCTYPE html>
<!-- Spécification du langage de la page et du sens de lecture -->
<html lang="fr" dir="ltr">

<head>

  <!-- Prise en charge des accents et autres caractères spéciaux -->
  <meta charset="utf-8" />
  <!-- Pour être responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Compatibilité internet explorer -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CDN de font awesome pour l'utilisation des fa-fa et des icones -->
  <script src="https://kit.fontawesome.com/eaadffbb2b.js"></script>
  <script src="../../assets/script/eaadffbb2b.js"></script>
  <!-- CDN de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../assets/CSS/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Lien pour le scroll to top -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/CSS/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
  <link href="../../assets/CSS/css?family=Merriweather:400,900,900i.css" rel="stylesheet">
  <!-- Lien avec la page CSS (toujours après Bootstrap pour éviter les bug) -->
  <link rel="stylesheet" href="<?= $PageCSS ?>" />
  <link rel="stylesheet" href="../../assets/CSS/footer.css" />
  <link rel="stylesheet" href="../../assets/CSS/style.css" />
  <!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="../../assets/CSS/jquery.mCustomScrollbar.min.css">
     <!-- Lien script pour animer -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <link href="../../assets/CSS/aos.css" rel="stylesheet">
    <!-- Lien éventuel pour l'utilisation d'une police -->
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Merienda|Permanent+Marker&display=swap" rel="stylesheet"> 
  <link href="../../assets/CSS/police.css" rel="stylesheet">
  <!-- Lien pour placer une icone dans l'onglet, avant le titre de la page -->
  <link rel="icon" href="../../assets/images/logo.jpg">
    <!-- Titre de la page affiché dans l'onglet -->
  <title>Kung-Fu.ThieuLam.Montivilliers - Don't think... Feel !</title>

</head>
<?php
setlocale(LC_ALL, 'fr_FR.UTF8');

if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ) : ?>
<!-- Code qui détecte l'activité (souris ou clavier) -->
<body onkeydown="activite_detectee = true; statut('actif');" onmousemove="activite_detectee = true; statut('actif');">
<?php endif; ?>

<!-- Pour le scroll to top -->
<a id="buttonScroll" class="rounded-circle"></a>

<?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ) : ?>
<!-- Pour la déconnexion après inactivité -->
<div id="statut" style="color:#ff0000;">Vous êtes inactif depuis 0 secondes.</div>
<?php endif; ?>

