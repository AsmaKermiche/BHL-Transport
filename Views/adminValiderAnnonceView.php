<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminAnnoncesValiderView
{

    public function afficher_admin_valider_annonces_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_annonces_non_validees();
        $footer = new footerView();
        $footer->afficher_footer();
    }

    public function afficher_annonces_non_validees()
    {
        $adminController = new adminController();
        $annonces = $adminController->get_all_annonces_non_validees_controller();
    ?>
        <?php if (isset($annonces)) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5 mb-3 clearfix">
                                <?php echo '<table class="table table-bordered table-striped" id="myTable" data-toggle="table" data-sort-stable="true" data-filter="true">';
                                echo "<thead>";
                                echo "<tr>";
                                echo '<th data-sortable="true">Adresse source</th>';
                                echo '<th data-sortable="true">Adresse destination</th>';
                                echo '<th data-sortable="true">Le poids</th>';
                                echo "<th data-sortable='true'>Le volume</th>";
                                echo '<th data-sortable="true">Le moyen du tranport</th>';
                                echo '<th data-sortable="true">Le type du tranport</th>';
                                echo '<th data-sortable="true">Le status de validation</th>';
                                echo '<th data-sortable="true">En cours/terminée</th>';
                                echo '<th data-sortable="true">La date</th>';
                                echo '<th >Action</th>';
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                ?>
                                <?php foreach ($annonces as $row) : ?>
                                    <?php
                                    echo "<tr>";
                                    echo "<td>" . $row->src . "</td>";
                                    echo "<td>" . $row->dest . "</td>";
                                    echo "<td>" . $row->poids . "</td>";
                                    echo "<td>" . $row->volume . "</td>";
                                    echo "<td>" . $row->moyen . "</td>";
                                    echo "<td>" . $row->type . "</td>";
                                    echo "<td>" . $row->status1 . "</td>";
                                    echo "<td>" . $row->status2 . "</td>";
                                    echo "<td>" . $row->date . "</td>";
                                    echo "<td>" ;
                                    echo '<a href="adminConfirmerValiderRouter.php?id_annonce=' . $row->id_annonce . '" class="btn btn-dark">Valider</a>';
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
<?php
    }
}
