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
    title: "Vous venez de supprimer",
    text: "<?= $_SESSION['userInfos'][0]['firstName'] ?>",
    type: "success"
}).then(function() {
  header("Refresh:0");
});              
        </script>
        <?php
}