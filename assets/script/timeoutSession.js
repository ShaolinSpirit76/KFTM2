// On déclare et initialise les variables utilisées
var activite_detectee = false;
var intervalle = 100;
var temps_inactivite = 0;
var inactivite_persistante = true;
// On crée la fonction qui teste toutes les x secondes l'activité du visiteur via activite_detectee
function testerActivite() {
  // On teste la variable activite_detectee
     // Si une activité a été détectée [On réinitialise activite_detectee, temps_inactivite et inactivite_persistante]
     if(activite_detectee) {
       activite_detectee = false;
       temps_inactivite = 0;
       inactivite_persistante = false;
     }
     // Si aucune activité n'a été détectée [on actualise le statut du visiteur et on teste/met à jour la valeur du temps d'inactivité]
     else {
       statut('inactif');
       // Si l'inactivite est persistante [on met à jour temps_inactivite]
       if(inactivite_persistante) {
         temps_inactivite += intervalle;
         // Si le temps d'inactivite dépasse les 10 minutes
         
      
         if(temps_inactivite == 600000){ 
                 
         Swal.fire({
         title: 'Oups !',
         text: 'Vous avez été déconnecté pour cause d\'inactivité...',
         type: 'error',
         confirmButtonText: 'Ok'
        }).then(function() {
            document.location.href = "../../view/templates/deconnexion.php";
            
        });
       
       
      } 
      
    }
       // Si l'inactivite est nouvelle [on met à jour inactivite_persistante]
       else
         inactivite_persistante = true;
     }
  // On relance la fonction ce qui crée une boucle
  setTimeout('testerActivite();', intervalle);
}



// On crée une fonction qui permet de mettre à jour le statut du visiteur
function statut(statut) {
    // On initialise la variable bloc créée par souci de lisibilité
    var bloc = document.getElementById('statut');
    // On supprime l'ancien statut affiché
    bloc.removeChild(bloc.firstChild);
    // Suivant le statut, on change la couleur d'écriture
    if(statut == 'actif')
      bloc.style.color = '#f1f0ee'; // Beige
    else if(statut == 'inactif')
      bloc.style.color = '#f1f0ee'; // Beige
    // On crée une variable statut_a_afficher [si il y a inactivité, on affiche le temps qui s'est écoulé depuis le début de l'inactivité]
    if(statut == 'inactif') {
      // On transforme le temps d'inactivité calculé en millisecondes en secondes
      var temps_secondes = temps_inactivite / 1000;
      var statut_a_afficher = statut + ' depuis ' + temps_secondes + ' secondes';
    }
    else
      var statut_a_afficher = statut;
    // On affiche le nouveau statut
    bloc.appendChild(document.createTextNode('Vous êtes ' + statut_a_afficher + '.'));
  }



// On lance la fonction testerActivite() pour la première fois, au chargement de la page
setTimeout('testerActivite();', intervalle);