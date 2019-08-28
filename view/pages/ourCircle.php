<?php
require_once '../../controller/ourCircleController.php';
include '../templates/head.php';
include '../../controller/regex.php';
?>


<!-- Début de la side-navbar -->

<div id="content">
    
    <div class="container-fluid fixedButton">

    <a role="button" id="sidebarCollapse" class="btn btn-info" data-toggle="collapse" href="#sidebar" aria-expanded="false" aria-controls="sidebar">
            <i class="fas fa-align-right"></i>
            <span>Menu</span>
</a>

    </div>

</div>
    

<div id="navbarAdmin" class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 class="police">Les membres de KFTM</h3>
        </div>
        <ul class="list-unstyled components">
            
            <li>
                <a class="text-white" id="ourCircleKungFu">Kung-Fu</a>
            </li>
            <li>
                <a class="text-white" id="ourCircleTaichi">Taïchi Chuan & Qi Gong</a>
            </li>
            <li>
                <a class="text-white" id="ourCircleSanda">Sanda & Shoubo</a>
            </li>
            <li>
                <a class="text-white" id="ourCircleAll">Tous les membres</a>
            </li>
            
           
        </ul>
        

    </nav>
</div>

<!-- Fin de la side navbar -->


<h1 class="police text-center" id="ourCircleTitle">Le cercle de KFTM</h1>



<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){
  // On rajoute une colonne dans la BDD en Tiny int. Elle prend 0 si
  // l'utilisateur ne veut pas afficher son profil, sinon 1.
  if ( ($displayUser['teacherRank'] === 'Sifu') && ($displayUser['showProfil'] == '1') ): ?>







  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
        <div class="mx-auto text-center">
          <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary text-center mx-auto" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>



    
  <?php endif; 
  } ?>
</div>
</div>



















<?php
if ( ($displayUser['teacherCourse'] === 'Kung-Fu') || (($displayUser['studentCourse'] === 'Kung-Fu')) ) : ?>

<div id="kungFuDiv">


<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['teacherRank'] === 'Tailaoshe') && ($displayUser['showProfil'] == '1') ): ?>

  


  



  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
   }?>   
</div>
</div>





















<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['teacherRank'] === 'Laoshe') && ($displayUser['showProfil'] == '1') ): ?>


  



  <div class="col-md-4 col-sm-12 mx-auto">
        <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
  }?>   
</div>
</div>




















<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['teacherRank'] === 'Taïjiaoshe') && ($displayUser['showProfil'] == '1') ): ?>


  



  <div class="col-md-4 col-sm-12 mx-auto">
      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
  }?>   
</div>
</div>
























<div class="container-fluid">
  <div class="row">
<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['teacherRank'] === 'Jiaoshe') && ($displayUser['showProfil'] == '1') ): ?>


  



  <div class="col-md-4 col-sm-12 mx-auto">
       <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
  }?> 
</div>
</div>
































<div class="container-fluid">
  <div class="row">



<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['teacherRank'] === 'Sibak') && ($displayUser['showProfil'] == '1') ): ?>


  <div class="col-md-4 col-sm-12 mx-auto">

      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <img src="../form/miniatures/<?=$displayUser['picture'];?>" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil <?=$displayUser['picture'];?>">
      <?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
  }?>      
  </div>
</div>
  












<div class="container-fluid">
  <div class="row">



<?php foreach($displayUsersResult as $displayUser){?>
  <?php if ( ($displayUser['status'] === 'élève') && ($displayUser['showProfil'] == '1') ): ?>


  <div class="col-md-4 col-sm-12 mx-auto">

      <div class="card mx-auto" style="width: 18rem;">

      <?php if (!empty($displayUser['picture'])): ?>
      <div class="mx-auto text-center">
      <img src="../form/miniatures/<?=$displayUser['picture'];?>"  style="width: 18rem; height: 16rem;" class="pictureSize card-img-top img-fluid" alt="Photo de profil <?=$displayUser['picture'];?>">
</div>
<?php else: ?>
      <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 18rem; height: 16rem;" alt="Photo de profil par défaut">
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="card-text text-center"><?=ucfirst($displayUser['status'])?></p>
    <a class="btn btn-primary" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card card-body">

  <?php if (isset($_SESSION['userInfos'][0]['mail']) && ($_SESSION['userInfos'][0]['mail']) === 'levray.jm@wanadoo.fr'):?>

<?php if (isset($displayUser['phoneNumber'])): ?>
  <p class="text-white">Téléphone : <?=$displayUser['phoneNumber']?> </p>
  <?php endif; ?>                  
                  
  <p class="text-white">Login : <?= $displayUser['userLog']?> </p>

  <?php endif; ?> 


  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ):?>

  <?php if (isset($displayUser['birthDate'])): ?>
  <p class="text-white">Date de naissance : <?=strftime('%d/%m/%Y',strtotime($displayUser['birthDate']))?> </p>
  <?php endif; ?>

    <p class="text-white">Mail : <?=$displayUser['mail']?> </p>

  <?php endif; ?>
  

  <?php if (isset($displayUser['studentCourse'])): ?>
  <p class="text-white">Cours en tant qu'élève : <?= $displayUser['studentCourse']?> </p>
  <?php endif; ?>

  <?php if (isset($displayUser['teacherCourse'])): ?>
                   <p class="text-white">Cours en tant que maître : <?= $displayUser['teacherCourse']?> </p>
                   <?php endif; ?>

  <?php if (isset($displayUser['groupAge'])): ?>
                   <p class="text-white">Groupe : <?= $displayUser['groupAge']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentYear'])): ?>
                   <p class="text-white">Année : <?= $displayUser['studentYear']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['childBelt'])): ?>
                   <p class="text-white">Ceinture enfant : <?= $displayUser['childBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['studentdBelt'])): ?>
                   <p class="text-white">Ceinture adulte : <?= $displayUser['studentBelt']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['teacherRank'])): ?>
                   <p class="text-white">Grade : <?= $displayUser['teacherRank']?> </p>
                   <?php endif; ?>

                   <?php if (isset($displayUser['presentation'])): ?>
                   <p class="text-white">Présentation : <?= $displayUser['presentation']?> </p>
                   <?php endif; ?>

  </div>
</div>


  </div>
</div>

       
</div>
    



                
  <?php endif; 
  }?>      
  </div>
</div>



</div>
<!-- Fin div Kung-Fu -->

<?php endif; ?>































































     





                
 

<?php
include '../templates/footer.php';
