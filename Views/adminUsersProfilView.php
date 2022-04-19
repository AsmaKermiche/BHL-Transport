<?php
require_once("headerView.php");
require_once("footerView.php");
class adminUsersProfilView
{
  public function afficher_user_profil_page()
  {
    $header = new headerView();
    $adminController = new adminController();
    $footer = new footerView();
    $user = $adminController->get_user_by_id_controller();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();    
    $this->afficher_profil($user);

    $footer->afficher_footer();
  }
  public function afficher_profil($user){
    ?>
<div class="row">
    <div class="container">
    <?php if (isset($user)) : ?>
        <form method="post">
            <div class="mb-3">
                <label class="small mb-1">Nom d'utilisateur</label>
                <input class="form-control" type="text" placeholder="Enter your username" name="username" value="<?php echo $user[0]->username ; ?>" disabled="disabled">
            </div>
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1">Prénom</label>
                    <input class="form-control"type="text" placeholder="Enter your first name" name="prenom" value="<?php echo $user[0]->prenom ; ?>" disabled="disabled">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1">Nom</label>
                    <input class="form-control" type="text" placeholder="Enter your last name" name="nom" value="<?php echo $user[0]->nom ; ?>" disabled="disabled">
                </div>
            </div>
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1">Email</label>
                    <input class="form-control" type="email" placeholder="Enter your email" name="email" value="<?php echo $user[0]->email ; ?>" disabled="disabled">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1" >Numéro de téléphone</label>
                    <input class="form-control"type="tel" placeholder="Enter your phone number" name="phone_number" value="<?php echo $user[0]->numero_telephone ; ?>" disabled="disabled">
                </div>
            </div>
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1"> Adresse principale</label>
                    <input class="form-control" type="text" placeholder="Enter your address" name="adress" value="<?php echo $user[0]->adresse_principale ; ?>" disabled="disabled">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1">Role</label>
                    <input class="form-control" type="text" placeholder="Enter your password"name="password" value="<?php echo $user[0]->role ; ?>" disabled="disabled">
                </div>
            </div>
            <?php if ($user[0]->role == 'transporteur') : ?>
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1">Adresse source</label>
                    <input class="form-control"type="text" placeholder="Enter your src" name="src" value="<?php echo $user[0]->adrsrc ; ?>" disabled="disabled">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1">Adresse destination</label>
                    <input class="form-control" type="text" placeholder="Enter your dest" name="dest" value="<?php echo $user[0]->adrdest ; ?>" disabled="disabled">
                </div>
            </div>       
            <?php endif; ?>      
        </form>
        <?php endif; ?>  
    </div>
</div>
<?php
  }
}