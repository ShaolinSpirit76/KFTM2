<?php
// Alerts de connexion
if(isset($connectionSuccess) && $connectionSuccess == true){
  ?>
        <script>
        Swal.fire(
          'Bonjour <?= $_SESSION['userInfos'][0]['firstName'] ?> !',
          'Ravi de vous revoir...',
          'success'
        );
        setTimeout(function(){
           document.location.href = "../../index.php"; 
        }, 2000);
        </script>
        <?php
}

if(isset($connectAdmin) && $connectAdmin == true){
  ?>
        <script>
        Swal.fire(
          'Bonjour <?= $_SESSION['userInfos'][0]['firstName'] ?> !',
          'Ravi de vous revoir...',
          'success'
        );
        setTimeout(function(){
           document.location.href = "../../admin/admin.php"; 
        }, 2000);
        </script>
        <?php
}

if(isset($connectionFailed) && $connectionFailed == true){
  ?>
        <script>
  Swal.fire({
  title: 'Oups !',
  text: 'L\'identifiant et/ou le mot de passe semble incorrect... :(',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
      
    }, 3000);
</script>
        <?php
}
if(isset($mdpFailed) && $mdpFailed == true){
  ?>
         <script>
  Swal.fire({
  title: 'Oups !',
  text: 'L\'identifiant et/ou le mot de passe semble incorrect... :(',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
      
    }, 3000);
</script>
        <?php
}
// Fin alerts connexion

// Alert de vérification
if(isset($identificationSuccess) && $identificationSuccess == true){
  ?>
        <script>
        Swal.fire({
    title: "A vous de jouer <?= $_SESSION['userInfos'][0]['firstName'] ?> !",
    text: "Vous êtes le maître...",
    type: "success"
}).then(function() {
    $('#newID').show();
});              
        </script>
        <?php
}

// Alert de suppression de compte
if(isset($deleteSuccess) && $deleteSuccess == true){
  ?>
        <script>
        Swal.fire({
    title: "Au-revoir  <?= $_SESSION['userInfos'][0]['firstName'] ?> !",
    text: "Vous nous manquerez...",
    type: "success"
}).then(function() {
    document.location.href = "../../index.php"; 
});              
        </script>
        <?php
}



// Alert de suppression de compte
if(isset($adminDeleteSuccess) && $adminDeleteSuccess == true){
  ?>
        <script>
        Swal.fire({
    title: "Suppression réussie ! ",
    text: "Une place s'est libérée...",
    type: "success"
        );
}).then(function() {
  document.location.href = "member.php";
});              
        </script>
        <?php
}

// Alert de passage d'un membre en mode admin
if(isset($adminRequestPower) && $adminRequestPower == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Un nouvel admin va vous épauler...',
          'success'
        );
        setTimeout(function(){
           document.location.href = "member.php"; 
        }, 2000);
        </script>
        <?php
}


// Alert de fin de mode admin pour un membre
if(isset($adminFired) && $adminFired == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Un admin nous a quitté...',
          'success'
        );
        setTimeout(function(){
           document.location.href = "member.php"; 
        }, 2000);
        </script>
        <?php
}


// Alert de suppression d'un évènement
if(isset($eventDeleted) && $eventDeleted == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'L\'évènement a bien été supprimé...',
          'success'
        );
        setTimeout(function(){
           document.location.href = "viewEvent.php"; 
        }, 2000);
        </script>
        <?php
}

// Alert d'inscription à un évènement'
if(isset($registrationAdded) && $registrationAdded == true){
  ?>
        <script>
        Swal.fire(
          'Sifu compte sur vous !',
          'Vous venez de vous inscrire à cet évènement... :)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "news.php"; 
        }, 2000);
        </script>
        <?php
}

// Alert de désinscription à un évènement'
if(isset($registrationDeleted) && $registrationDeleted == true){
  ?>
        <script>
        Swal.fire(
          'Dommage !',
          'Vous venez de vous désinscrire de cet évènement... :(',
          'success'
        );
        setTimeout(function(){
           document.location.href = "news.php"; 
        }, 2000);
        </script>
        <?php
}