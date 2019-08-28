</div> 
<!-- Fermeture div contents -->
</div>


  <!-- CDN JavaScript toujours à la fin du body pour éviter les bug -->
  <!-- D'abord le CDN de JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="../../assets/script/jquery.min.js"></script>
  <!-- Puis le CDN du Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="../../assets/script/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- Et enfin le CDN de Bootstrap.js -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../../assets/script/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../../assets/script/jquery.mCustomScrollbar.concat.min.js"></script>


  <!-- Sweet alert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="../../assets/script/sweetalert2@8.js"></script>

  
  <!-- Lien avec la page JS (toujours après les CDN de JQuery) -->
  <script src="../../assets/script/scroll.js"></script>
  <script src="../../assets/script/script.js"></script>
  <?php if(isset($_SESSION['connection']) && $_SESSION['connection'] == true ) : ?>
  <script src="../../assets/script/timeoutSession.js"></script>
  <?php endif; ?>
  <script src="../../assets/script/dragNdrop.js"></script>
  <!-- Script pour l'animation -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../../assets/script/aos.js"></script>
  <!-- Liens script.js pour les particules -->
  <script src="../../assets/script/particle.js"></script>
  <script src="../../assets/script/jquery_002.js"></script>
  <script src="../../assets/script/plugins.js"></script>
    

</body>



</html>