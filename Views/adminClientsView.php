<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Controllers/adminController.php");

class adminClientsView
{

    public function afficher_admin_clients_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_clients();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_clients()
    {
        $adminController = new adminController();
        $clients = $adminController->get_all_clients_controller();
    ?>
        <h2 class='text-center'>La liste de tous les clients </h2>
        <?php if (isset($clients)) : ?>
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
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                ?>
                                <?php foreach ($clients as $row) : ?>
                                    <?php
                                    echo "<tr>";
                                    echo "<td>" . $row->nom . "</td>";
                                    echo "<td>" . $row->prenom . "</td>";
                                    echo "<td>" . $row->numero_telephone . "</td>";
                                    echo "<td>" . $row->email . "</td>";
                                    echo "<td>" . $row->username . "</td>";
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
