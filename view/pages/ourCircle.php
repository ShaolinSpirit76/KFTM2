<?php
require_once '../../controller/ourCircleController.php';
include '../templates/head.php';
?>


<!-- Début de la side-navbar -->

<div id="content">
    
    <div class="container-fluid fixedButton">

    <a role="button" id="sidebarCollapse" class="btn btn-info" data-toggle="collapse" href="#sidebar" aria-expanded="false" aria-controls="sidebar">
            <i class="fas fa-align-right"></i>
            <span>Menu</span>
</a>

    </div>

    <form class="form-inline my-2 my-lg-0 search police2">
      <input class="form-control mr-sm-2" type="search" placeholder="Nom, prénom..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>

</div>
    

<div id="navbarOurCircle" class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 class="police">Les membres de KFTM</h3>
        </div>
        <ul class="list-unstyled components police2">

        <li>
       <select class="custom-select navbarSelect">
       <option value="" selected disabled>Par grade</option>
  <option value="">Elève</option>
  <option value="">Sisook</option>
  <option value="">Simui</option>
  <option value="">Sibak</option>
  <option value="">Jiaoshe</option>
  <option value="">Taïjiaoshe</option>
  <option value="">Laoshe</option>
  <option value="">Taïlaoshe</option>
  <option value="">Sifu</option>
</select>
        </li>
        <li>
        <select class="custom-select navbarSelect">
       <option value="" selected disabled>Par discipline</option>
  <option value="">Kung-Fu</option>
  <option value="">Taïchi Chuan & Qi Gong</option>
  <option value="">Sanda & Shoubo</option>
  </select>
        </li>
            <li>
                <a class="text-white" href="" id="ourCircleAll">Tous les membres</a>
            </li>
            <li>
             
                <a role="button" class="text-white" data-toggle="collapse" href="#sidebar" aria-expanded="false" aria-controls="sidebar" id="ourCircleAll"><small><i class="fas fa-align-left"></i> Fermer</small></a>
            </li>
            
            
           
        </ul>
        

    </nav>
</div>

<!-- Fin de la side navbar -->


<h1 class="police text-center" id="ourCircleTitle">Le cercle de KFTM</h1>



<div class="container-fluid police2">
  <div class="row">





  <?php foreach($displayUsersResult as $displayUser){?>
  <?php if ($displayUser['showProfil'] == '1'): ?>


  <div class="col-md-4 col-sm-12 mx-auto <?= ( ($displayUser['teacherRank'] == 'Sifu') ) ? 'col-md-12' : '' ?>">
    
      <div class="card mx-auto">

      <?php if (!empty($displayUser['picture'])): ?>
      <div class="mx-auto text-center">
        <br />
      <img src="../form/miniatures/<?=$displayUser['picture'];?>"  style="width: 20rem; height: 18rem;" class="pictureSize card-img-top img-fluid" alt="Photo de profil <?=$displayUser['picture'];?>">
</div>
<?php else: ?>
<div class="mx-auto text-center">
<br />
  <?php if ($displayUser['gender'] == 'Femme') :?>
      <img src="../../assets/images/female-306407_960_720.png" class="card-img-top img-fluid" style="width: 20rem; height: 18rem;" alt="Photo de profil par défaut">
     <?php else: ?>
     <img src="../../assets/images/iconfinder_Asian_boss_131491.png" class="card-img-top img-fluid" style="width: 20rem; height: 18rem;" alt="Photo de profil par défaut">
  <?php endif; ?>
      </div>
      <?php endif; ?>

      <div class="card-body mx-auto">
      <div class="mx-auto text-center">
    <h5 class="card-title red"> <?=$displayUser['firstName']?> <?=$displayUser['lastName']?></h5>
    <p class="white police"><?= (isset($displayUser['teacherRank'])) ? $displayUser['teacherRank'] : $displayUser['status'] ?></p>
    
    <a class="btn btn-outline-warning" data-toggle="collapse" href="#<?=$displayUser['lastName']?><?=$displayUser['ID']?>" role="button" aria-expanded="false" aria-controls="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">En savoir plus</a>
</div>
    
        <div class="collapse" id="<?=$displayUser['lastName']?><?=$displayUser['ID']?>">
  <div class="card-body">
    
  <?php if (isset($displayUser['status'])): ?>
  <p class="card-text red text-center"><?= $displayUser['status'] != 'élève' ? ucfirst($displayUser['status']) : ''?></p>
  <?php endif; ?>

  <?php  if (isset($_SESSION['userInfos'][0]['admin']) && ($_SESSION['userInfos'][0]['admin']) === '1'): ?>

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

































































     





                
 

<?php
include '../templates/footer.php';
