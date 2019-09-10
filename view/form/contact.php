<?php
  require_once '../../controller/contactControllerStart.php';
  include '../templates/head.php';
  include '../../controller/regex.php';
  require_once '../../controller/contactController.php';
  ?>



<section class="mb-4 police2">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez-nous</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Vous avez une question ? N'hésitez pas à nous contacter directement.<br /> Le maître reviendra vers vous au plus vite (7 jours max) pour répondre à toutes vos interrogations.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="contact.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Noms</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="mail" name="mail" class="form-control" required>
                            <label for="email" class="">Adresse mail *</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Sujet</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
                            <label for="message">Votre message *</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <div class="g-recaptcha" id="recaptcha" data-sitekey="6Leno7MUAAAAAMZSGnEvxMzJCw-k7fX556kdwqUz">
          </div>

                <div class="text-center text-md-right">
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </div>

            </form>

            
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Montivilliers, 76290, France</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+336. 22. 16. 71. 80</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>levray.jm@wanadoo.fr</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>




<!-- <div class="entry-inner-singular-wrapper">

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



	

<?php
include '../templates/footer.php';
?>