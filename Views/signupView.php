<?php
require_once("headerView.php");
require_once("footerView.php");
class signupView
{

  public function afficher_signup_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_signup_form();
    $footer = new footerView();
    $footer->afficher_footer();
    $signupPage = new signupController();
    $signupPage->signup();
  }

  public function afficher_signup_form()
  {
?>
    <div class="container" style="max-width: 600px;">
      <div class="form-container">
        <form role="form" method="post">
          <div class="form-group">
            <label>Nom</label>
            <input class="form-control" type="text" placeholder="Entrez votre nom" name="nom" />
          </div>
          <div class="form-group">
            <label>Prénom</label>
            <input class="form-control" type="text" placeholder="Entrez votre prénom" name="prenom" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" placeholder="Entrez votre email" name="email" />
          </div>
          <div class="form-group">
            <label>Numéro de téléphone</label>
            <input class="form-control" type="text" placeholder="Entrez votre numéro de téléphone" name="phonenumber" />
          </div>
          <div class="form-group">
            <label>Adresse principale</label>
            <input class="form-control" type="text" placeholder="Entrez votre adresse principale" name="address" />
          </div>
          <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input class="form-control" type="text" placeholder="Entrez votre nom d'utilisateur" name="username" />
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input class="form-control" type="password" placeholder="Entrez votre mot de passe " name="password" />
          </div>
          <div style="padding-left: 20px">
            <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox" onclick="displayTransp()">
            <label style="font-size: 16px" for="checkbox-1" class="checkbox-custom-label">Voulez-vous être un transporteur?</label>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" id="adrsrc" style="display:none" placeholder="Adresse source" name="adrsrc" />
          </div>
          <div class="form-group">
            <input class="form-control" type="text" id="adrdest" style="display:none" placeholder="Adresse destination" name="adrdest" />
          </div>
          <input style="display:none ; padding-left: 20px" id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox" onclick="displayCertifie()">
          <label style="display:none; font-size: 16px ; padding-left: 20px" id="certified-check" for="checkbox-2" class="checkbox-custom-label">Voulez-vous être un transporteur certifié?</label>
          <div style=" padding-left: 20px;">
            <div>
              <button type="button" onclick="displayDemandeMessage()" class="btn btn-primary" id="btn-dmd" style="display:none; border: grey; background-color: grey ; margin-bottom: 15px">Envoyer votre demande</button>
            </div>
            <p class="message" id="msg"></p>
          </div>
          <div style=" padding-left: 20px ; padding-top: 20px">
            <input type="submit" value="Créer un compte" name="submit" class="btn btn-primary" />
            <p class="message" style="padding-top: 10px;">Vous avez déjà un compte? <a class="suite" href="loginRouter.php">Connectez-vous</a></p>
          </div>
        </form>
      </div>
    </div>
<?php
  }
}
