<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/homeController.php");

class searchView
{

  public function afficher_search_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_search_annonces();
    $footer = new footerView();
    $footer->afficher_footer();
  }
  public function afficher_search_annonces()
  {
    $homeController = new homeController();
    $annonces = $homeController->get_annonces_search_controller();

?>
<div class="container">
    <div class="card-deck">
        <?php if (isset($annonces)) : ?>
        <?php foreach ($annonces as $row) : ?>
        <div class="card shadow-sm mb-4">
            <?php $id_annonce = $row->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $row->id_user;
                    ?> <img src=<?php echo "img/" . $row->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $row->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($row->texte) ?></p>
                <div class="mt-auto">
                    <?php echo '<a href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                    <?php if(isset($_SESSION['id_connected_user'])) : ?>
                    <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php
  }
}