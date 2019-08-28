<?php
session_start();
include 'headHome.php';
include 'CDNSweetAlert2.php';
?>

<style>
body {
    /* Code pour que l'image reste fixe et responsive */
    margin: 0;
    padding: 0;
    background: url(../../assets/images/theme/abstract-3092201_960_720.jpg) no-repeat center fixed;
    -webkit-background-size: cover;
    /* pour anciens Chrome et Safari */
    background-size: cover;
    /* version standardisée */
  }
</style>

<script>
Swal.fire({
  position: 'top-end',
  type: 'success',
  title: 'Vous avez bien été déconnecté ;)',
  text: 'A bientôt <?= $_SESSION['userInfos'][0]['firstName'] ?>...',
  showConfirmButton: false,
  timer: 2500
})
setTimeout(function(){
    document.location.href = "../../index.php";
    }, 2000);
</script>

<?php
include 'footerAdmin.php';
session_destroy();