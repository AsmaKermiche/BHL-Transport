<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/homeController.php");

class userAnnoncesView
{

  public function afficher_user_annonces_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_user_annonces();
    $footer = new footerView();
    $footer->afficher_footer();
  }
  public function afficher_user_annonces()
  {
    $annonceController = new annonceController();
    $userAnnonces = $annonceController->get_annonce_user_controller();

?>
<div class="container">
            <div class="card-deck">
                <?php if (isset($userAnnonces)) : ?>
                <?php foreach ($userAnnonces as $row) : ?>
                <div class="card shadow-sm mb-4">
                <?php $src = $row->src;
                  $dest = $row->dest; ?>
                    <?php $id = $row->id_annonce; ?>
                    <img src=<?php echo "img/" . $row->image_path ?> class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row->titre ?></h5>
                        <?php echo '<a class="mt-auto" href="listTransporteursRouter.php?src=' . $src . '&dest=' . $dest . '&id_annonce=' . $id . '">Voir la liste des transporteurs>></a>'; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
</div>
<?php
  }
}
