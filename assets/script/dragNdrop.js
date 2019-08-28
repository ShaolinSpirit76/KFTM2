


// Méthode 3
// (function() {

//     var dndHandler = {

//         draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement

//         applyDragEvents: function(element) {

//             element.draggable = true;

//             var dndHandler = this; // Cette variable est nécessaire pour que l'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »

//             element.addEventListener('dragstart', function(e) {
//                 dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
//                 e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
//             });

//         },

//         applyDropEvents: function(dropper) {

//             dropper.addEventListener('dragover', function(e) {
//                 e.preventDefault(); // On autorise le drop d'éléments
//                 this.className = 'dropper drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
//             });

//             dropper.addEventListener('dragleave', function() {
//                 this.className = 'dropper'; // On revient au style de base lorsque l'élément quitte la zone de drop
//             });

//             var dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

//             dropper.addEventListener('drop', function(e) {

//                 var target = e.target,
//                     draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
//                     clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément

//                 while (target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
//                     target = target.parentNode;
//                 }

//                 target.className = 'dropper'; // Application du style par défaut

//                 clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
//                 dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

//                 draggedElement.parentNode.removeChild(draggedElement); // Suppression de l'élément d'origine

//             });

//         }

//     };

//     var elements = document.querySelectorAll('.draggable'),
//         elementsLen = elements.length;

//     for (var i = 0; i < elementsLen; i++) {
//         dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
//     }

//     var droppers = document.querySelectorAll('.dropper'),
//         droppersLen = droppers.length;

//     for (var i = 0; i < droppersLen; i++) {
//         dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
//     }

// })();






// Méthode 1
// window.addEventListener('load',onload,false);
// function onload(){
// b1=document.getElementById('box1');
// box=document.getElementById('mabox');
// b1.addEventListener('dragstart',dragstart, false);
// box.addEventListener('dragenter',function(e){e.preventDefault()}, false);
// box.addEventListener('dragover',function(e){e.preventDefault()}, false);
// box.addEventListener('drop',dropped, false);
// }
// function dragstart(e){
// var value=e.currentTarget.innerHTML;
// e.dataTransfer.setData('text',value);
// }
// function dropped(e){
// e.preventDefault();
// e.currentTarget.innerHTML= e.dataTransfer.getData('text');
// var toto= $(this).children("img").attr("alt");
// document.getElementById('test').value = toto; // [lol]
// }







// Méthode 2
// $(document).on('dragenter', '#dropfile', function() {
//             $(this).css('border', '3px dashed red');
//             return false;
// });
 
// $(document).on('dragover', '#dropfile', function(e){
//             e.preventDefault();
//             e.stopPropagation();
//             $(this).css('border', '3px dashed red');
//             return false;
// });
 
// $(document).on('dragleave', '#dropfile', function(e) {
//             e.preventDefault();
//             e.stopPropagation();
//             $(this).css('border', '3px dashed #BBBBBB');
//             return false;
// });






// $(document).on('drop', '#dropfile', function(e) {
//     if(e.originalEvent.dataTransfer){
//                if(e.originalEvent.dataTransfer.files.length) {
//                            // Stop the propagation of the event
//                            e.preventDefault();
//                            e.stopPropagation();
//                            $(this).css('border', '3px dashed green');
//                            // Main function to upload
//                            upload(e.originalEvent.dataTransfer.files);
//                }  
//     }
//     else {
//                $(this).css('border', '3px dashed #BBBBBB');
//     }
//     return false;
// });






// function upload(files) {
//     var f = files[0] ;

//     // Only process image files.
//     if (!f.type.match('image/jpeg')) {
//                alert('The file must be a jpg image') ;
//                return false ;
//     }
//     var reader = new FileReader();

//     // When the image is loaded,
//     // run handleReaderLoad function
//     reader.onload = handleReaderLoad;

//     // Read in the image file as a data URL.
//     reader.readAsDataURL(f);            
// }








// function handleReaderLoad(evt) {
//     var pic = {};
//     pic.file = evt.target.result.split(',')[1];

//     var str = jQuery.param(pic);

//     $.ajax({
//                type: 'POST',
//                url: 'inscriptionForm.php',
//                data: str,
//                success: function(data) {
//                            do_something(data) ;
//                }
//     });
// }