<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/adminController.php");

class adminView
{

  public function afficher_admin_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_categories();
    $footer = new footerView();
    $footer->afficher_footer();
  }
  public function afficher_categories()
  {
    $adminController = new adminController();
    $categories = $adminController->get_categories_controller();
?>

    <?php if (isset($categories)) : ?>
      <div class="container">
        <div class="card-deck">
          <div class="card" style="width: 18rem;">
            <a href="adminUsersRouter.php"><img class="card-img-top" src="<?php echo "img/" . $categories[0]->image_path ?>" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $categories[0]->name_categorie ?></h5>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <a href="adminAnnoncesRouter.php"><img class="card-img-top" src="<?php echo "img/" . $categories[1]->image_path ?>" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $categories[1]->name_categorie ?></h5>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <a href="adminSignalementsRouter.php"><img class="card-img-top" src="<?php echo "img/" . $categories[2]->image_path ?>" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $categories[2]->name_categorie ?></h5>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <a href="adminNewsRouter.php"><img class="card-img-top" src="<?php echo "img/" . $categories[3]->image_path ?>" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $categories[3]->name_categorie ?></h5>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <a href="adminContentRouter.php"><img class="card-img-top" src="<?php echo "img/" . $categories[4]->image_path ?>" alt="Card image cap"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $categories[4]->name_categorie ?></h5>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div style=" padding-top: 20px "></div>
<?php
  }
}
