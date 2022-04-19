<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/homeController.php");

class userTransactionsView
{

    public function afficher_user_transactions_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_user_transactions();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_user_transactions()
    {
        $id_user = 0;
        $annonceController = new annonceController();
        $transactions = $annonceController->get_user_transactions_controller();

?>
        <div class="container">
            <div class="card-deck">
                <?php if (isset($transactions)) : ?>
                    <?php foreach ($transactions as $row) : ?>
                        <div class="card shadow-sm mb-4">
                            <?php $id_annonce = $row->id_annonce;
                            if(isset($_SESSION['role'])){
                            if($_SESSION['role'] == 'transporteur'){
                            $id_user = $row->id_user;}
                            elseif($_SESSION['role'] == 'client'){
                            $id_user = $row->id_transporteur;
                            }
                        }
                            ?>
                            <img src=<?php echo "img/" . $row->image_path ?> class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $row->titre ?></h5>
                                <div class="mt-auto">
                                    <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                                    <?php echo '<a href="noterTransportRouter.php?id_annonce=' . $id_annonce . '" class="btn btn-dark">Noter le transport</a>'; ?>
                                    <div style="padding-bottom: 10px;"></div>
                                    <?php echo '<a class="btn btn-dark" href="confirmSignalerRouter.php?id_annonce=' . $id_annonce . '&id_signale=' . $id_user . '">Signaler</a>'; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div style="padding-bottom: 340px;"></div>
<?php
    }
}
