<?php
require_once("headerView.php");
require_once("footerView.php");
class adminLoginView
{

  public function afficher_login_admin_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_login_admin();
    $footer = new footerView();
    $footer->afficher_footer();
    $login = new adminController();
    $login->login_admin_controller();
  }

  public function afficher_login_admin()
  {
?>
    <div class="container"style="max-width: 600px;">
      <div class="form-container">
        <form method="post">
        <div class="form-group">
        <label>Nom d'utilisateur</label>
        <input class="form-control" type="text" placeholder="Entrez votre nom d'utilisateur" name="username_admin" />
        </div>
        <div class="form-group">
        <label>Mot de passe</label>
        <input class="form-control" type="password" placeholder="Entrez votre Mot de passe" name="password_admin" />
        </div>
        <div style=" padding-left: 20px ">
        <input type="submit" value="Se connecter comme admin" name="submit" class="btn btn-primary"/>
        </div>
        </form>
      </div>
    </div>
<?php
  }
}
