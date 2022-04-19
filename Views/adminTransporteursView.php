<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Controllers/adminController.php");

class adminTransporteursView
{

    public function afficher_admin_transporteurs_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_transporteurs();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_transporteurs()
    {
        $adminController = new adminController();
        $transporteurs = $adminController->get_all_transporteurs_controller();
    ?>
        <h2 class='text-center'>La liste de tous les transporteurs </h2>
        <?php if (isset($transporteurs)) : ?>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5 mb-3 clearfix">
                                <?php echo '<table class="table table-bordered" id="myTable" >';
                                echo "<thead>";
                                echo "<tr>";
                                echo '<th onclick="sortTable(0)">Nom</th>';
                                echo '<th onclick="sortTable(1)">Prénom</th>';
                                echo '<th onclick="sortTable(2)">Numéro de téléphone</th>';
                                echo '<th onclick="sortTable(3)">Email</th>';
                                echo "<th onclick='sortTable(4)'>Nom d'utilisateur</th>";
                                echo "<th onclick='sortTable(4)'>Status</th>";
                                echo '<th >Action</th>';
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                ?>
                                <?php foreach ($transporteurs as $row) : ?>
                                    <?php
                                    echo "<tr>";
                                    echo "<td>" . $row->nom . "</td>";
                                    echo "<td>" . $row->prenom . "</td>";
                                    echo "<td>" . $row->numero_telephone . "</td>";
                                    echo "<td>" . $row->email . "</td>";
                                    echo "<td>" . $row->username . "</td>";
                                    if($row->status1 == ''){
                                        $status = $row->status2;
                                    }elseif($row->status2 == ''){
                                        $status = $row->status1;
                                    }
                                    echo "<td>" . $status . "</td>";
                                    echo "<td>" ;
                                    echo '<a href="adminChangeStatusRouter.php?id_user=' . $row->id_user . '" class="btn btn-dark">Modifier le status</a>';
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
            </div>
        <?php endif ?>
<?php
    }
}
