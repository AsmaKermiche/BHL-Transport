<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminSignalementsView
{

    public function afficher_admin_signalements_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_signalements();
        $footer = new footerView();
        $footer->afficher_footer();
    }

    public function afficher_signalements()
    {
        $adminController = new adminController();
        $signalements = $adminController->get_all_signalements_controller();
?>
<?php if (isset($signalements)) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <?php echo '<table class="table table-bordered table-striped" id="myTable" data-toggle="table" data-sort-stable="true">';
                            echo "<thead>";
                            echo "<tr>";
                            echo '<th data-sortable="true">
                                <a>ID du signaleur</a>
                                </th>';
                            echo "<th data-sortable='true'>
                                <a>Nom d'utilisateur du signaleur</a>
                                </th>";
                            echo "<th data-sortable='true'>
                                <a>Role du signaleur</a>
                                </th>";
                            echo "<th data-sortable='true'>
                                <a>ID de l'annonce</a>
                                </th>";
                            echo "<th data-sortable='true'>
                                <a>ID de l'utilisateur signalé</a>
                                </th>";
                            echo "<th data-sortable='true'>
                                <a>Nom d'utilisateur du signalé</a>
                                </th>";
                            echo "<th data-sortable='true'>
                                <a>Texte du signalement</a>
                                </th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody id='annonces-table'>";
                            ?>
                <?php foreach ($signalements as $row) : ?>
                <?php
                                echo "<tr>";
                                echo "<td>";
                                echo "<a class='suite' href=\"adminUsersProfilRouter.php?id_user=$row->id_signaleur\">$row->id_signaleur</a>";
                                 "</td>";
                                echo "<td>";
                                echo "<a class='suite'  href=\"adminUsersProfilRouter.php?id_user=$row->id_signaleur\">$row->username_signaleur</a>";
                                "</td>";
                                echo "<td>" . $row->role_signaleur . "</td>";
                                echo "<td>";
                                echo "<a class='suite'  href=\"annonceRouter.php?id_annonce=$row->id_annonce\">$row->id_annonce</a>";
                                "</td>";
                                echo "<td>";
                                echo "<a class='suite'  href=\"adminUsersProfilRouter.php?id_user=$row->id_signale\">$row->id_signale</a>";
                                "</td>";
                                echo "<td>";
                                echo "<a class='suite'  href=\"adminUsersProfilRouter.php?id_user=$row->id_signale\">$row->username_signale</a>";
                                "</td>";
                                echo "<td>" . $row->texte_signalement . "</td>";
                                echo "</td>";
                                echo "</tr>";
                                ?>
                <?php endforeach; ?>
                <?php echo "</tbody>";
                            echo "</table>";
                            ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<div style="padding-bottom: 240px;"></div>
<?php
    }
}