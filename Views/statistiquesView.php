<?php
require_once("headerView.php");
require_once("footerView.php");
class statsView
{
    public function afficher_stats_page()
    {
        $header = new headerView();
        $footer = new footerView();
        $statsController = new statsController();
        $users = $statsController->get_number_users_controller();
        $annonces = $statsController->get_number_annonces_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_stats_users_card($users);
        $this->afficher_stats_annonces_card($annonces);
        $footer->afficher_footer();
    }
    public function afficher_stats_users_card($users)
    {
    ?>
        <div class="container">
                <div class="row justify-content-left" style="padding-bottom: 30px; padding-left: 15px">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            ?>
                            <h5 class="card-title">Nombre d'utilisateurs</h5>
                            <p class="card-text"><?php echo $users ?> </p>
                        </div>
                    </div>
                </div>
        </div>
    <?php
    }
    public function afficher_stats_annonces_card($annonces)
    {
    ?>
        <div class="container">
                <div class="row justify-content-left" style="padding-bottom: 120px; padding-left: 15px">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            ?>
                            <h5 class="card-title">Nombre d'annonces</h5>
                            <p class="card-text"><?php echo $annonces ?> </p>
                        </div>
                    </div>
                </div>
        </div>
    <?php
    }
}
