<?php
require_once("headerView.php");
require_once("footerView.php");
class LoginView
{

  public function afficher_login_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_login_form();
    $footer = new footerView();
    $footer->afficher_footer();
    $login = new loginController();
    $login->login();
  }

  public function afficher_login_form()
  {
?>
    <div class="container"style="max-width: 600px;">
      <div class="form-container">
        <form method="post">
        <div class="form-group">
        <label>Nom d'utilisateur</label>
        <input class="form-control" type="text" placeholder="Entrez votre nom d'utilisateur" name="username" />
        </div>
        <div class="form-group">
        <label>Mot de passe</label>
        <input class="form-control" type="password" placeholder="Entrez votre Mot de passe" name="password" />
        </div>
        <div style=" padding-left: 20px ">
        <input type="submit" value="Se connecter" name="submit" class="btn btn-primary"/>
        <p class="message" style="padding-top: 10px;">Vous n'avez pas un compte? <a class="suite" href="signupRouter.php">Inscrivez-vous</a></p>
        </div>
        </form>
      </div>
    </div>
<?php
  }
}
