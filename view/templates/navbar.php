<!-- Début navbar -->
<nav id="menu" class="navbar navbar-expand-lg">
     
     

      <div class="row w-100">
        <div class="collapse navbar-collapse">
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="100%" height="100%" />
              </li>
            </ul>
          </div>
          <div class="col-10">
            <ul class="justify-content-center align-items-center navbar-nav mx-auto">
              <li class="nav-item">
                <div class="home">
                  <a class="clickTop nav-link" href="<?= $home ?>"><img src="../../assets/images/yuuyake/iconfinder_Sensu_17594.png" alt="éventail" class="img-fluid" title="" width="100%" height="100%" /><br />Accueil</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="schoolDoors">
                  <a class="clickTop nav-link" href="<?= $schoolDoors ?>"><img src="../../assets/images/yuuyake/iconfinder_Firewall_17573.png" alt="portes chinoises" class="img-fluid" title="" width="100%" height="100%" /><br />Portes de l'école</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="news">
                  <a class="clickTop nav-link" href="<?= $news ?>"><img src="../../assets/images/yuuyake/iconfinder_Trash (Empty)_17596.png" alt="bol fumant" class="img-fluid" title="" width="100%" height="100%" /><br />Fil d'actualités</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="kungfu dropdown">
                <a style="background-color:black; color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/yuuyake/iconfinder_My documents_17583.png" alt="dossiers" class="img-fluid" title="" width="85%" height="85%" /><span class="yellow-hover"><br />Nos disciplines</span></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?= $kungfu ?>">Kung Fu</a>
    <a class="dropdown-item" href="<?= $taichi ?>">Taïchi Chuan & Qi Gong</a>
    <a class="dropdown-item" href="<?= $sanda ?>">Sanda & Shoubo</a>
  </div>                 
              </li>
              <li class="nav-item">
                <div class="ourCircle">
                  <a class="clickTop nav-link" href="<?= $ourCircle ?>"><img src="../../assets/images/yuuyake/iconfinder_Ichat_17578.png" alt="panneau en bois" class="img-fluid" title="" width="100%" height="100%" /><br />Notre cercle</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="links dropdown">
                <a style="background-color:black; color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/yuuyake/iconfinder_Photoshop_17588.png" alt="PS en calligraphie" class="img-fluid" title="" width="100%" height="100%" /><span class="yellow-hover"><br />Liens</span></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>
    <a class="dropdown-item" href="<?= $pictures ?>">Photos</a>
    <a class="dropdown-item" href="<?= $video ?>">Vidéos</a>
    <?php endif;?>
    <a class="dropdown-item" href="<?= $techniques ?>">Cahiers techniques</a>
    <a class="dropdown-item" href="<?= $otherSchools ?>">Autres écoles</a>
    <a class="dropdown-item" href="<?= $contact ?>">Contact</a>
  </div>                       
             </li>
              <li class="nav-item">
                <div class="shop">
                  <a class="clickTop nav-link" href="<?= $shop ?>"><img src="../../assets/images/yuuyake/iconfinder_Services_17595.png" class="img-fluid spaceTop" alt="échoppe chinoise" title="" width="90%" height="90%" /><p class="spaceTop">Boutique</p></a>
                </div>
              </li>
              <li class="nav-item">
              <?php if (isset($_SESSION['userInfos']) && $_SESSION['connection'] == true): ?>
              <a href="<?= $deconnexionPage ?>"><img src="../../assets/images/yuuyake/iconfinder_Internet Explorer_17581.png" alt="Tigre chinois" class="img-fluid" title="Déconnexion" width="90%" height="90%" /></a>
              <?php else: ?>
              <a href="<?= $connexionPage ?>"><img src="../../assets/images/yuuyake/iconfinder_Firefox_17572.png" alt="Tigre chinois" class="img-fluid" title="Connexion" width="90%" height="90%" /></a>
              <?php endif; ?>
                <div class="shop dropdown">
                  <a style="background-color:black; color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="yellow-hover">
                    <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>Options<?php else: ?>Connexion<?php endif; ?></span></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
     <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>
    <a class="dropdown-item" href="<?= $deconnexionPage ?>">Déconnexion</a>
        <a class="dropdown-item" href="<?= $myAccount ?>">Mon compte</a>
    <a class="dropdown-item" href="<?= $checkCalendar ?>">Gérer le calendrier</a>

    <!-- Condition pour accéder à la page admin grâce au mail -->
    <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>
    <a class="dropdown-item" href="../../admin/admin.php">Admin</a>
    <?php endif ?>

    <?php else: ?>
<a class="dropdown-item" href="<?= $connexionPage ?>">Connexion</a>
<a class="dropdown-item" href="<?= $inscriptionPage ?>">Inscription</a>
   <?php endif;?>
  </div>             
             </li>
             </ul>
          </div>
          
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item text-center">

              <?php if ( (isset($_SESSION['connection']) && $_SESSION['connection'] == true ) && (empty($_SESSION['userInfos'][0]['picture'])) ): ?>
              <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="100%" height="100%" /><br /><br />
              <a href="<?= $myAccount ?>" title="Mon Compte"><small > <?= ($_SESSION['userInfos'][0]['firstName']) ?></small></a>
             
              <?php elseif ( (isset($_SESSION['connection']) && $_SESSION['connection'] == true ) && (!empty($_SESSION['userInfos'][0]['picture'])) ): ?>
                <br /><br />
                <a href="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" target="_blank" title="Cliquez pour agrandir"><img src="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" class="img-fluid rounded" alt="photo de profil" width="100%" height="100%" /></a>
                <a href="<?= $myAccount ?>" title="Mon Compte"><small > <?= ($_SESSION['userInfos'][0]['firstName']) ?></small></a>
                <?php else: ?>
                <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="100%" height="100%" />
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Fin navbar -->







 <!-- Début navbar minimisée  -->
<nav id="navbarMin" class="navbar navbar-expand-lg sticky-top">
      <a class="navbar-brand" href="#"></a>
      <button id="navButton" class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span id="textNavButton">Cliquez pour voir le menu</span>
      </button>

     

      <div class="row w-100">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="60%" height="60%" />
              </li>
            </ul>
          </div>
          <div class="col-10">
            <ul class="justify-content-center align-items-center navbar-nav mx-auto">
              <li class="nav-item">
                <div class="home">
                  <a class="clickTop nav-link" href="<?= $home ?>">Accueil</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="schoolDoors">
                  <a class="clickTop nav-link" href="<?= $schoolDoors ?>">Portes de l'école</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="news">
                  <a class="clickTop nav-link" href="<?= $news ?>">Fil d'actualités</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="kungfu dropdown">
                <a style="color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="yellow-hover">Nos disciplines</span></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?= $kungfu ?>">Kung Fu</a>
    <a class="dropdown-item" href="<?= $taichi ?>">Taïchi Chuan & Qi Gong</a>
    <a class="dropdown-item" href="<?= $sanda ?>">Sanda & Shoubo</a>
  </div>                 
              </li>
              <li class="nav-item">
                <div class="ourCircle">
                  <a class="clickTop nav-link" href="<?= $ourCircle ?>">Notre cercle</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="links dropdown">
                <a style="color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="yellow-hover">Liens</span></a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>
    <a class="dropdown-item" href="<?= $pictures ?>">Photos</a>
    <a class="dropdown-item" href="<?= $video ?>">Vidéos</a>
    <?php endif;?>
    <a class="dropdown-item" href="<?= $techniques ?>">Cahiers techniques</a>
    <a class="dropdown-item" href="<?= $otherSchools ?>">Autres écoles</a>
    <a class="dropdown-item" href="<?= $contact ?>">Contact</a>
  </div>                       
             </li>
              <li class="nav-item">
                <div class="shop">
                  <a class="clickTop nav-link" href="<?= $shop ?>">Boutique</a>
                </div>
              </li>

              <li class="nav-item">
                <div class="shop dropdown">
                  <a style="color:white;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="yellow-hover"><?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>Options<?php else: ?>Connexion<?php endif;?></span></a></span></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
     <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>
    <a class="dropdown-item" href="<?= $deconnexionPage ?>">Déconnexion</a>
        <a class="dropdown-item" href="<?= $myAccount ?>">Mon compte</a>
    <a class="dropdown-item" href="<?= $checkCalendar ?>">Gérer le calendrier</a>

    <!-- Condition pour accéder à la page admin grâce au mail -->
    <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>
    <a class="dropdown-item" href="../../admin/admin.php">Admin</a>
    <?php endif ?>

    <?php else: ?>
    <a class="dropdown-item" href="<?= $connexionPage ?>">Connexion</a>
<a class="dropdown-item" href="<?= $inscriptionPage ?>">Inscription</a>
   <?php endif;?>
  </div>           
             </li>
             <?php if ( (isset($_SESSION['connection']) && $_SESSION['connection'] == true ) && (empty($_SESSION['userInfos'][0]['picture'])) ): ?>
             <li class="nav-item dropdown">
                <div>
                 <a href="<?= $myAccount ?>" title="Mon compte"><small > <?= ($_SESSION['userInfos'][0]['firstName']) ?></small></a>
                </div>
              </li>
             </ul>
          </div>
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item text-center">
              <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="60%" height="60%" />
              </li>
            </ul>
          </div>
          <?php elseif ( (isset($_SESSION['connection']) && $_SESSION['connection'] == true ) && (!empty($_SESSION['userInfos'][0]['picture'])) ): ?>
          <li class="nav-item dropdown">
                <div>
                  <a href="<?= $myAccount ?>" title="Mon compte"><small > <?= ($_SESSION['userInfos'][0]['firstName']) ?></small></a>
                </div>
              </li>
             </ul>
          </div>
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item text-center">
              <a href="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" target="_blank" title="Cliquez pour agrandir"><img src="../../view/form/miniatures/<?=$_SESSION['userInfos'][0]['picture']?>" class="img-fluid rounded" alt="photo de profil" width="50%" height="50%" /></a>
              </li>
            </ul>
          </div>
          <?php else : ?>
          </div>
          <div class="col-1">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item text-center">
                <img src="../../assets/images/756974331.gif" class="img-fluid rounded-circle" alt="logo YinYang ThieuLam" width="60%" height="60%" />
              </li>
            </ul>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>

     <!-- Fin navbar minimisée -->

     <div id="body">




  <div id="contents">