<?php 
require_once("headerView.php");
require_once("footerView.php");

class ConfirmTransactionView{
    public function afficher_confirm_transaction_page(){
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_confirm();
        $footer = new footerView();
        $footer->afficher_footer();
        $confirmController = new confirmController();
        $confirmController->insert_transaction_controller();
    }

    public function afficher_confirm(){
?> 
<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Confirmer votre transportation</h2>
                    <form method="post">
                        <div class="alert alert-secondary">
                            <p>Vous êtes sur vous voulez transportez ce bien?</p>
                            <p>
                                <input type="submit" name="transporter" value="Oui" class="btn btn-success">
                                <a href="demandesRouter.php" class="btn btn-secondary">Non</a>
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