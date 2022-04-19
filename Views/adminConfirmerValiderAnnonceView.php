<?php 
require_once("headerView.php");
require_once("footerView.php");

class adminConfirmValiderView{
    public function afficher_confirm_valider_page(){
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_confirm_valider();
        $footer = new footerView();
        $footer->afficher_footer();
        $confirmController = new confirmController();
        $confirmController->valider_annonce_controller();
    }

    public function afficher_confirm_valider(){
?> 
<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Confirmer votre validation</h2>
                    <form method="post">
                        <div class="alert alert-danger">
                            <p>Vous etes sur vous voulez valider cette annonce?</p>
                            <p>
                                <input type="submit" name="valider" value="Oui" class="btn btn-success">
                                <a href="adminValiderAnnonceRouter.php" class="btn btn-secondary">Non</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>  
    <?php 
    }
}