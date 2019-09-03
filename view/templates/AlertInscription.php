<?php
// Alerts d'inscription
// En cas de succès
if(isset($success) && $success == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Votre inscription a bien été enregistrée :)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "../../index.php"; 
        }, 3000);
        </script>
        <?php
}


//  En cas d'échec
if(isset($swalErrorForm) && $swalErrorForm == true){
  ?>
        <script>
  Swal.fire({
  title: 'Oups !',
  text: 'Il doit y avoir une erreur dans votre formulaire... :(',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
      
    }, 3000);
</script>
        <?php
}


//  Doublon avec la photo de profil
if(isset($swalErrorPicture) && $swalErrorPicture == true){
  ?>
        <script>
  Swal.fire({
  title: 'Oups !',
  text: 'Ce nom de photo est déjà utilisé... :(',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
      
    }, 3000);
</script>
        <?php
}

// Fin alerts d'inscription




// Alert de mise à jour du profil
if(isset($updateSuccess) && $updateSuccess == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Votre profil a bien été mis à jour ;)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "../pages/ourCircle.php"; 
         }, 3000);
        </script>
        <?php
}

if(isset($IDmodifSuccess) && $IDmodifSuccess == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Vos identifiants ont bien été mis à jour ;)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "myAccount.php"; 
         }, 3000);
        </script>
        <?php
}




// Alert pour le reCapatcha v2
if(isset($reCaptchaError) && $reCaptchaError == true){
  ?>
        <script>
  Swal.fire({
  title: 'Oups !',
  text: 'Il doit y avoir une erreur avec le reCaptcha... :(',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
      
    }, 3000);
</script>
        <?php
}



// Alert pour l'entrée d'un nouvel évènement
if(isset($newEventSuccess) && $newEventSuccess == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Votre évènement a bien été créé ;)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "viewEvent.php"; 
         }, 2000);
        </script>
        <?php
}


// Alert de mise à jour d'un évènement
if(isset($newUpdateEventSuccess) && $newUpdateEventSuccess == true){
  ?>
        <script>
        Swal.fire(
          'Bien joué !',
          'Votre évènement a bien été modifié ;)',
          'success'
        );
        setTimeout(function(){
           document.location.href = "viewEvent.php"; 
         }, 2000);
        </script>
        <?php
}