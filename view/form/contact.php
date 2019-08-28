<?php
  require_once '../../controller/contactControllerStart.php';
  include '../templates/head.php';
  include '../../controller/regex.php';
  require_once '../../controller/contactController.php';
  ?>

<div class="entry-inner-singular-wrapper">

				<div class="entry-inner-content">
					<div class="entry-content">
					
<label class="" for="">Nom <span class="">*</span></label><div class=""><div class=""><input type="text" id="" class="" name="" required>

<label for="wpforms-148-field_0" class="wpforms-field-sublabel after ">Prénom</label></div><div class="wpforms-field-row-block wpforms-one-half"><input type="text" id="wpforms-148-field_0-last" class="wpforms-field-name-last wpforms-field-required" name="wpforms[fields][0][last]" required>

<label for="wpforms-148-field_0-last" class="wpforms-field-sublabel after ">Nom</label></div></div></div><div id="wpforms-148-field_1-container" class="wpforms-field wpforms-field-email" data-field-id="1">
    
<label class="wpforms-field-label" for="wpforms-148-field_1">E-mail <span class="wpforms-required-label">*</span></label><input type="email" id="wpforms-148-field_1" class="wpforms-field-medium wpforms-field-required" name="wpforms[fields][1]" required></div><div id="wpforms-148-field_3-container" class="wpforms-field wpforms-field-text" data-field-id="3">
    
<label class="wpforms-field-label" for="wpforms-148-field_3">Sujet</label><input type="text" id="wpforms-148-field_3" class="wpforms-field-medium" name="wpforms[fields][3]" ></div><div id="wpforms-148-field_2-container" class="wpforms-field wpforms-field-textarea" data-field-id="2">
    
<label class="wpforms-field-label" for="wpforms-148-field_2">Commentaire ou message <span class="wpforms-required-label">*</span></label>
<textarea id="wpforms-148-field_2" class="wpforms-field-medium wpforms-field-required" name="wpforms[fields][2]" required></textarea></div></div><div class="wpforms-field wpforms-field-hp">
    


<button type="submit" name="wpforms[submit]" class="wpforms-submit " id="wpforms-submit-148" value="wpforms-submit" data-alt-text="Envoi...">Envoyer</button></div></form></div></code></pre>



					</div><!-- .entry-content -->
                </div><!-- .entry-inner-content -->
</div>

<?php
include '../templates/footer.php';
?>