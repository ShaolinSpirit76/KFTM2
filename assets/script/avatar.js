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
  // Permet de vider la valeur de l'input affiche personnelle quand on choisit photo enregistrées
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

document.getElementById('clear-button2').addEventListener('click', function () {
    ["representation01.jpg", "representation02.jpg", "representation03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })

  document.getElementById('clear-button3').addEventListener('click', function () {
    ["passagedegrade01.jpg", "passagedegrade02.jpg", "passagedegrade03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })

  document.getElementById('clear-button4').addEventListener('click', function () {
    ["cassetuile01.jpg", "cassetuile02.jpg", "cassetuile03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })

  document.getElementById('clear-button5').addEventListener('click', function () {
    ["entrainement01.jpg", "entrainement02.jpg", "entrainement03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })

  document.getElementById('clear-button6').addEventListener('click', function () {
    ["seminaire01.jpg", "seminaire02.jpg", "seminaire03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })

  document.getElementById('clear-button7').addEventListener('click', function () {
    ["barbecue01.jpg", "barbecue02.jpg", "barbecue03.jpg"].forEach(function(id) {
      document.getElementById(id).checked = false;
    });
    return false;
  })



// A faire une fois avec toutes les photos modèles : permet de vider le choix quand on choisir photo perso
document.getElementById('personalPictureChoice').addEventListener('click', function () {
  ["tournoi01.jpg", "tournoi02.jpg", "tournoi03.jpg", "competition01.jpg", "competition02.jpg", "competition03.jpg", "representation01.jpg", "representation02.jpg", "representation03.jpg", "passagedegrade01.jpg", "passagedegrade02.jpg", "passagedegrade03.jpg", "cassetuile01.jpg", "cassetuile02.jpg", "cassetuile03.jpg", "entrainement01.jpg", "entrainement02.jpg", "entrainement03.jpg", "seminaire01.jpg", "seminaire02.jpg", "seminaire03.jpg", "barbecue01.jpg", "barbecue02.jpg", "barbecue03.jpg"].forEach(function(id) {
    document.getElementById(id).checked = false;
  });
  return false;
})