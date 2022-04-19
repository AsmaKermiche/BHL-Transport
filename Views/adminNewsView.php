<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminNewsView
{

    public function afficher_admin_news_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_ajouter_news();
        $this->afficher_news();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_ajouter_news()
    {
?>
<div class="container">
    <a href="adminAddNewsRouter.php" class="btn btn-primary">Ajouter news</a>
</div>
<?php
    }

    public function afficher_news()
    {
        $adminController = new adminController();
        $news = $adminController->get_all_news_controller();
    ?>
<?php if (isset($news)) : ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <?php echo '<table class="table table-bordered table-striped" id="myTable" data-toggle="table" data-sort-stable="true">';
                            echo "<thead>";
                            echo "<tr>";
                            echo '<th data-sortable="true">
                                <a>ID</a>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Titre</a>
                                </th>';
                            echo '<th data-sortable="true">
                                <a>Date</a>
                                </th>';
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody id='annonces-table'>";
                            ?>
                <?php foreach ($news as $row) : ?>
                <?php
                                echo "<tr>";
                                echo "<td>" . $row->id_news . "</td>";
                                echo "<td>" . $row->titre . "</td>";
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