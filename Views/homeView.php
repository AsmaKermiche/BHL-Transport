<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/homeController.php");

class homeView
{

  public function afficher_home_page()
  {
    $header = new headerView();
    $header->entete_page();
    $header->afficher_header();
    $this->afficher_diaporama();
    $header->afficher_menu();
    $this->afficher_search_form();
    $search = new homeController();
    $search->get_annonces_search_controller();
    $this->afficher_annonces();
    $this->afficher_presentation();
    $footer = new footerView();
    $footer->afficher_footer();
  }

  public function afficher_diaporama()
    {
        $home = new homeController();
        $diapo = $home->get_diaporama_controller();
    ?>
<?php if (isset($diapo)) : ?>
<div class="container">
    <?php foreach ($diapo as $row) : ?>
    <?php $id_news = $row->id_news; ?>
    <?php
                      echo '<a href="newsDetailsRouter.php?id_news=' . $id_news . '">'?>
    <img class="mySlides img-fluid" src=<?php echo "img/" . $row->image_path?> height="550px" width="100%">
    </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php
    }
  public function afficher_search_form()
  {
?>
<div class="container" style="padding-bottom: 50px; padding-left:0px">
    <form method="post" action="searchRouter.php" class="form-inline">
        <div class="form-group">
            <label for="src" style="padding-right: 20px;">Emplacement de départ</label>
            <input name="adrsrc" type="text" class="form-control" id="src" placeholder="De ..">
        </div>
        <div class="form-group">
            <label for="dest" style="padding-right: 20px;">Emplacement d'arrivée</label>
            <input name="adrdest" type="text" class="form-control" id="dest" placeholder="A .. ">
        </div>
        <span class="input-group-btn"style="padding-left: 10px;">
            <input type="submit" value="Rechercher" name="submit" class="btn btn-primary" />
        </span>
    </form>
</div>
<?php
  }


  public function afficher_annonces()
  {
    $homeController = new homeController();
    $annonces = $homeController->get_annonces_controller();

  ?>
<div class="container">
    <!-- Ligne1 -->
    <div class="card-deck">
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[0]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[0]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[0]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[0]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[1]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[1]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[1]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[1]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[2]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[2]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[2]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[2]->texte) ?></p>
                <?php echo '<a class="mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[3]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[3]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[3]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[3]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
    </div>
    <!-- Ligne2 -->
    <div class="card-deck">
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[4]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[4]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[4]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[4]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[5]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[5]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-uppercase"><?php echo $annonces[5]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[5]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[6]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[6]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[6]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[6]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <?php $id = $annonces[7]->id_annonce; ?>
            <img src=<?php echo "img/" . $annonces[7]->image_path ?> class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $annonces[7]->titre ?></h5>
                <p class="card-text"><?php echo get_premiers_mots($annonces[7]->texte) ?></p>
                <?php echo '<a class=" mt-auto suite" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
            </div>
        </div>

    </div>
</div>
<?php
  }

  public function afficher_presentation()
  {
  ?>
<div class="container">
    <div style=" padding-top: 20px "></div>
    <a href="presentationRouter.php" class="btn btn-primary">Comment cela fonctionne?</a>
    <div style=" padding-top: 20px "></div>
</div>
<?php
  }
}