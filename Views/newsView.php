<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/newsController.php");

class newsView
{

  public function afficher_news_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $header->afficher_menu();
    $this->afficher_news();
    $footer = new footerView();
    $footer->afficher_footer();
  }
  public function afficher_news()
  {
    $newsController = new newsController();
    $news = $newsController->get_all_news();

?>
    <div class="container">
      <div class="card-deck">
        <?php if (isset($news)) : ?>
          <?php foreach ($news as $row) : ?>
            <div class="card shadow-sm mb-4">
              <?php $id = $row->id_news; ?>
              <img src=<?php echo "img/" . $row->image_path ?> class="card-img-top" alt="...">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $row->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($row->texte) ?></p>
                <?php echo '<a class="mt-auto suite" href="newsDetailsRouter.php?id_news=' . $id . '">Lire la suite >></a>'; ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
<?php
  }
}
