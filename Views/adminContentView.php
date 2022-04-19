<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminContentView
{

    public function afficher_admin_content_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_cards();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_cards()
    {
?>
<div class="container">
    <div class="card-deck">
        <div class="card shadow-sm mb-4" style="width: 18rem;">
            <div class="card-body d-flex flex-column">
            <h5><a class="suite" href="adminPresentationRouter.php">Gestion de la page présentation</a></h5>
            </div>
        </div>
        <div class="card shadow-sm mb-4" style="width: 18rem;">
            <a href="adminClientsRouter.php"></a>
            <div class="card-body d-flex flex-column">
            <h5><a class="suite" href="adminContactRouter.php">Gestion de la page contact</a></h5>
            </div>
        </div>
    </div>
</div>
<div style="padding-bottom: 240px;"></div>
<?php
    }
}