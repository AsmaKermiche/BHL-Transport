<?php
require_once("headerView.php");
require_once("footerView.php");
include_once("Controllers/annonceController.php");

class listView
{

    public function afficher_list_page()
    {
        $header = new headerView();
        $footer = new footerView();
        $listController = new listController();
        $annonceController = new annonceController();
        $list1 = $listController->get_list_controller();
        $list2 = $listController->get_list_transporteurs_postules_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        ?> <h3 class='text-center'>La liste de tous les transporteurs qui ont postulé </h3> <?php
        $this->afficher_list_transporteurs_postules($list2);
        ?><h3 class='text-center' style="padding-top: 50px;">La liste de tous les transporteurs que vous pouvez contacter</h3> <?php
        $this->afficher_list_transporteurs_contacter($list1);
        if(isset($_POST['accepter']) || isset($_POST['contacter'])){
        $annonceController->envoyer_confirmation_transporteur_controller();}
        $footer->afficher_footer();
    }

    public function afficher_list_transporteurs_postules($list)
    {
?>
<?php if (isset($list)) : ?>
    <div class="container">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <?php echo '<table class="table table-bordered table-striped" >';
                                echo "<thead>";
                                echo "<tr>";
                                echo '<th scope="col">Nom</th>';
                                echo '<th scope="col">Prénom</th>';
                                echo '<th scope="col">Numéro de téléphone</th>';
                                echo '<th scope="col">Email</th>';
                                echo '<th scope="col">Adresse source</th>';
                                echo '<th scope="col">Adresse destination</th>';
                                echo '<th scope="col">Action</th>';
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                ?>
                <?php foreach ($list as $row) : ?>
                <?php
                                        if (isset($row['id_user'])){
                                        $_GET['id_transporteur_postule'] = $row['id_user'];
                                        }
                                        echo "<tr>";
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['prenom'] . "</td>";
                                        echo "<td>" . $row['numero_telephone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['adrsrc'] . "</td>";
                                        echo "<td>" . $row['adrdest'] . "</td>";
                                        echo "<form method='post'>";
                                        echo '<td><input class="btn btn-success" type="submit" value="Accepter" name="accepter"</td>';
                                        echo "</form>";
                                        echo "</tr>";
                                        ?>
                <?php endforeach; ?>
                <?php echo "</tbody>";
                                echo "</table>";
                                ?>
            </div>
        </div>
    </div>
<?php endif ?>
<?php

    }
    public function afficher_list_transporteurs_contacter($list)
    {
?>
<?php if (isset($list)) : ?>
<div class="wrapper">
    <div class="container">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <?php echo '<table class="table table-bordered table-striped" >';
                                echo "<thead>";
                                echo "<tr>";
                                echo '<th scope="col">Nom</th>';
                                echo '<th scope="col">Prénom</th>';
                                echo '<th scope="col">Numéro de téléphone</th>';
                                echo '<th scope="col">Email</th>';
                                echo '<th scope="col">Adresse source</th>';
                                echo '<th scope="col">Adresse destination</th>';
                                echo '<th scope="col">Action</th>';
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                ?>
                <?php foreach ($list as $row) : ?>
                <?php
                                        if (isset($row['id_user'])){
                                        $_GET['id_transporteur_contact'] = $row['id_user'];
                                        }
                                        echo "<tr>";
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['prenom'] . "</td>";
                                        echo "<td>" . $row['numero_telephone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['adrsrc'] . "</td>";
                                        echo "<td>" . $row['adrdest'] . "</td>";
                                        echo "<form method='post'>";
                                        echo '<td><input class="btn btn-success" type="submit" value="Contacter" name="contacter"</td>';
                                        echo "</form>";
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