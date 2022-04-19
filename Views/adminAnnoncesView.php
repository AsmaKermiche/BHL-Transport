<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminAnnoncesView
{

    public function afficher_admin_annonces_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_valider_annonce();
        $this->afficher_annonces();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_valider_annonce()
    {
?>
<div class="container">
    <a href="adminValiderAnnonceRouter.php" class="btn btn-primary">Valider une annonce</a>
</div>
<?php
    }

    public function afficher_annonces()
    {
        $adminController = new adminController();
        $annonces = $adminController->get_all_annonces_controller();
    ?>
<?php if (isset($annonces)) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <?php echo '<table class="table table-bordered table-striped" id="myTable" data-toggle="table" data-sort-stable="true">';
                            echo "<thead>";
                            echo "<tr>";
                            echo '<th data-sortable="true">
                                <a>Adresse source</a>
                                <input class="form-control" type="text" value=""   id="src"/>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Adresse source</a>
                                <input class="form-control" type="text" value=""   id="dest"/>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Poids</a>
                                <input class="form-control" type="text" value=""   id="poids"/>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Volume</a>
                                <input class="form-control" type="text" value=""   id="volume"/>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Moyen du transport</a>
                                <input class="form-control" type="text" value=""   id="moyen"/>                            </th>';
                            echo '<th data-sortable="true">
                                <a>Type du transport</a>
                                <input class="form-control" type="text" value=""   id="type"/>                            </th>';
                            echo '<th data-sortable="true">
                                <a>Statut</a>
                                <input class="form-control" type="text" value=""   id="status1"/>                            </th>';
                            echo '<th data-sortable="true">
                                <a>En cours/Terminée</a>
                                <input class="form-control" type="text" value=""   id="status2"/>                            </th>';
                            echo '<th data-sortable="true">
                                <a>Date</a>
                                <input class="form-control" type="text" value=""   id="date"/>                            </th>';
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody id='annonces-table'>";
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