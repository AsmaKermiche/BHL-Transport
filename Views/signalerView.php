<?php
require_once("headerView.php");
require_once("footerView.php");

class signalerView
{
    public function afficher_signaler_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_signaler();
        $footer = new footerView();
        $footer->afficher_footer();
        $confirmController = new confirmController();
        $confirmController->signaler_user_controller();
    }

    public function afficher_signaler()
    {
?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mt-5 mb-3">Signaler un utilisateur</h2>
                        <form method="post">
                            <div class="alert alert-danger">
                                <p>Vous êtes sur vous voulez signaler cet utilisateur?</p>
                                <div class="form-group">
                                    <label>Le contenu de votre signalement</label>
                                    <textarea class="form-control" placeholder="Entrez le contenu de votre signalement" name="texte" rows="5"></textarea>
                                </div>
                                <p>
                                    <input type="submit" name="signaler" value="Oui" class="btn btn-success">
                                    <a href="userTransactionsRouter.php" class="btn btn-secondary">Non</a>
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
