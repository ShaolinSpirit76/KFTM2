<?php
// Alerts d'accès non permis
if(isset($forbidden) && $forbidden == true){
  ?>
<script>
  Swal.fire({
  title: 'Oups !',
  text: 'Vous n\'avez pas la permission d\'accéder à ce contenu...',
  type: 'error',
  confirmButtonText: 'Ok'
});
setTimeout(function(){
    document.location.href = "../../index.php";
    }, 5000);
    </script>


<?php
}