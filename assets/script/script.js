// Gestion de l'affichage des membres selon la discipline
// dans la page Notre cercle

// $('#kungFuDiv').show();
// $('#taichiDiv').show();
// $('#sandaDiv').show();


// Gestion des photos dans l'ajout d'un évènement
$('#personalPicture').hide();
$('#registeredPicture').hide();

$('#personalPictureChoice').click(function(){
  $('#personalPicture').show();
  $('#registeredPicture').hide();
});

$('#registeredPictureChoice').click(function(){
  $('#personalPicture').hide();
  $('#registeredPicture').show();
  // Permet de vider la valeur de l'input affiche personnelle
  $('#eventPicture').val('');
});

// Modèle qui permet à la croix d'effacer le choix en type radio
document.getElementById('clear-button').addEventListener('click', function () {
  ["tournoi01.jpg", "tournoi02.jpg", "tournoi03.jpg"].forEach(function(id) {
    document.getElementById(id).checked = false;
  });
  return false;
})
// A faire pour les 9 types d'évènements
document.getElementById('clear-button1').addEventListener('click', function () {
  ["competition01.jpg", "competition02.jpg", "competition03.jpg"].forEach(function(id) {
    document.getElementById(id).checked = false;
  });
  return false;
})

// A faire une fois avec toutes les photos modèles : permet de vider le choix
document.getElementById('personalPictureChoice').addEventListener('click', function () {
  ["tournoi01.jpg", "tournoi02.jpg", "tournoi03.jpg", "competition01.jpg", "competition02.jpg", "competition03.jpg"].forEach(function(id) {
    document.getElementById(id).checked = false;
  });
  return false;
})

  




// $('#back1').addEventListener('click', function(){
//   ["tournoi01.jpg", "tournoi02.jpg", "tournoi03.jpg"].forEach(function(id) {
//     document.getElementById(id).checked = false;
//   });
//   return false;
// });
 


// Gestion de l'eventType personnalisé dans le formulaire newEvent de la plateforme Admin
$('#otherEventType').hide();
$('#statut').hide();

$('#eventType').click(function(){
  if($(this).val() == 'Autre'){
    $('#otherEventType').show();
  }else{
    $('#otherEventType').hide();
  }
   
  });



// Gestion de l'affichage de la navbar Admin
$('#navbarAdmin').hide();
$("#sidebarCollapse").click(function() {
  $('#navbarAdmin').show();
}); 

// Gestion de l'affichage de la navbar ourCircle
$('#navbarOurCircle').hide();
$("#sidebarCollapse").click(function() {
  $('#navbarOurCircle').show();
}); 




// Affichage conditionnel du formulaire d'inscription
// div cachées avant tout choix
$('#studentCourse').hide();
$("#groupAge").hide();
$("#studentYear").hide();
$("#childBelt").hide();
$("#studentBelt").hide();
$("#teacherCourse").hide();
$("#teacherRank").hide();


// Si statut élève alors
$("#élève").click(function() {
  $('#studentCourse').show();
  $("#teacherCourse").hide();
  $("#groupAge").show();
  $("#studentYear").show();
  $("#childBelt").hide();
  $("#studentBelt").hide();
  $("#teacherRank").hide();


// Si groupe enfant alors
  $("#Enfants").click(function() {
  $("#childBelt").show();
  $("#studentBelt").hide();
  $("#teacherRank").hide();
  });   

 // Si groupe ados alors
  $("#Ados").click(function() {
    $("#childBelt").show();
    $("#studentBelt").hide();
    $("#teacherRank").hide();
      });  
      
// Si groupe adulte alors
      $("#Adultes").click(function() {
        $("#childBelt").hide();
        $("#studentBelt").show();
        $("#teacherRank").hide();
          });   
});

// Si statut maître alors
$("#maître").click(function() {
  $('#studentCourse').hide();
  $("#teacherCourse").show();
  $("#groupAge").hide();
  $("#studentYear").hide();
  $("#childBelt").hide();
  $("#studentBelt").show();
  $("#teacherRank").show();
});

$("#maître_et_élève").click(function() {
  $('#studentCourse').show();
  $("#teacherCourse").show();
  $("#groupAge").hide();
  $("#studentYear").show();
  $("#childBelt").hide();
  $("#studentBelt").show();
  $("#teacherRank").show();
});





// Affichage conditionnel du formulaire mon compte
// div cachées avant toute modification
$('#newID').hide();
$('#newPic').hide();
$('#countDelete').hide();

$("#updatePicture").click(function() {
  $('#newPic').show();
});

$("#countDeleteButton").click(function() {
  $('#countDelete').show();
});

$("#crossBackDelete").click(function() {
  $('#countDelete').hide();
});

$("#backDelete").click(function() {
  $('#countDelete').hide();
});



// Pour les animations
AOS.init();



// Gestion de l'ancre

$(document).ready(function() {
  $(".clickTop").click(function() {
    $('html, body').animate({
      scrollTop: $("#connexion").offset().top
    }, 2000);
  });
});





// Vérification de la confirmation du mot de passe du formulaire d'inscription

        var regexLogin = /^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}*µ%!§.;,?<>]{2,15}[- ']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9œ&~#{([|_\^@)°+=}*µ%!§.;,?<>]{0,15}$/;
        var regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_.])([-.+!*$@%_\w]{8,15})$/;

        $("#confirmPassword").focusout(function() {
          var password = $("#password").val();
          var confirmPassword = $("#confirmPassword").val();
          if (password == "") {
            $("#password").css("border", "solid 2px red");
            $("#confirmPassword").css("border", "solid 2px red");
            alert("Veuillez entrer votre mot de passe dans le premier champs !");
          } else if (confirmPassword == "") {
            $("#password").css("border", "solid 2px green");
            $("#confirmPassword").css("border", "solid 2px red");
            alert("Veuillez entrer votre mot de passe dans le second champs !");
          } else if (password != confirmPassword) {
            $("#confirmPassword").css("border", "solid 2px red");
            alert("Confirmation du mot de passe invalide");
          } else {
            $("#password").css("border", "solid 2px green");
            $("#confirmPassword").css("border", "solid 2px green");
          }
        });

// Et du formulaire de mise à jour

        $("#newConfirmPassword").focusout(function() {
          var newPassword = $("#newPassword").val();
          var newConfirmPassword = $("#newConfirmPassword").val();
          if (newPassword == "") {
            $("#newPassword").css("border", "solid 2px red");
            $("#newConfirmPassword").css("border", "solid 2px red");
            alert("Veuillez entrer votre mot de passe dans le premier champs !");
          } else if (newConfirmPassword == "") {
            $("#newPassword").css("border", "solid 2px green");
            $("#newConfirmPassword").css("border", "solid 2px red");
            alert("Veuillez entrer votre mot de passe dans le second champs !");
          } else if (newPassword != newConfirmPassword) {
            $("#newConfirmPassword").css("border", "solid 2px red");
            alert("Confirmation du mot de passe invalide");
          } else {
            $("#newPassword").css("border", "solid 2px green");
            $("#newConfirmPassword").css("border", "solid 2px green");
          }
        });


        // modal connexion

        $('#login').on('shown.bs.modal', function () {
          $('#login').trigger('focus')
        });

        $(document).ready(function () {
          $('.modal').modal();
      });
      

      // Pour la side-navbar de la page admin
      $(document).ready(function () {

        $("#sidebar").mCustomScrollbar({
             theme: "minimal"
        });
    
        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            // and also adjust aria-expanded attributes we use for the open/closed arrows
            // in our CSS
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    
    });
      