<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminUsersView
{

    public function afficher_admin_users_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_cards();
        $this->afficher_users();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_cards()
    {
?>
<div class="container">
    <div class="card-deck">
        <div class="card shadow-sm mb-4" style="width: 18rem; height:300px">
            <a href="adminTransporteursRouter.php"><img height="200px" class="card-img-top"
                    src="img/transporteurs.png"></a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mt-auto">Gestion des transporteurs</h5>
            </div>
        </div>
        <div class="card shadow-sm mb-4" style="width: 18rem; height:300px">
            <a href="adminClientsRouter.php"><img class="card-img-top" src="img/clients.png" alt="Card image cap"></a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mt-auto">Gestion des clients</h5>
            </div>
        </div>
    </div>
</div>
<?php
    }
    public function afficher_users()
    {
        $adminController = new adminController();
        $users = $adminController->get_all_users_controller();
    ?>
<h2 class='text-center'>La liste de tous les utilisateurs </h2>
<?php if (isset($users)) : ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <?php echo '<table class="table table-bordered table-striped" data-toggle="table" data-sort-stable="true" data-filter="true">';
                                echo "<thead>";
                                echo "<tr>";
                                echo '<th data-sortable="true">
                                <a>Nom</a>
                                <input class="form-control" type="text" value=""   id="nom"/>
                                </th>';
                                echo '<th data-sortable="true">
                                <a>Prénom</a>
                                <input class="form-control" type="text" value=""   id="prenom"/>
                                </th>';
                                echo '<th data-sortable="true">
                                <a>Numéro de téléphone</a>
                                <input class="form-control" type="text" value=""   id="phonenumber"/>
                                </th>';
                                echo '<th data-sortable="true">
                                <a>Email</a>
                                <input class="form-control" type="text" value=""   id="email"/>
                                </th>';
                                echo "<th data-sortable='true'>
                                <a>Nom d'utilisateur</a>
                                <input class='form-control' type='text' value=''   id='username'/> 
                                </th>";
                                echo '<th data-sortable="true">
                                <a>Role</a>
                                <input class="form-control" type="text" value=""   id="role"/>
                                </th>';
                                echo '<th >Action</th>';
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody id='users-table'>";
                                ?>
                    <?php foreach ($users as $row) : ?>
                    <?php
                                    echo "<tr>";
                                    echo "<td>" . $row->nom . "</td>";
                                    echo "<td>" . $row->prenom . "</td>";
                                    echo "<td>" . $row->numero_telephone . "</td>";
                                    echo "<td>" . $row->email . "</td>";
                                    echo "<td>" . $row->username . "</td>";
                                    echo "<td>" . $row->role . "</td>";
                                    echo "<td>";
                                    echo '<a href="adminUsersProfilRouter.php?id_user=' . $row->id_user . '" class="btn btn-dark">Consulter le profil</a>';
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