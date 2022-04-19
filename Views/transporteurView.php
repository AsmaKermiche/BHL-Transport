<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("homeView.php");


class transporteurView
{

    public function afficher_home_page()
    {
        $header = new headerView();
        $home = new homeView();
        $header->entete_page();
        $header->afficher_header();
        $home->afficher_diaporama();
        $header->afficher_menu();
        $home->afficher_search_form();
        $this->afficher_ajouter_annonce();
        $this->afficher_annonces_transp();
        $home->afficher_presentation();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_ajouter_annonce()
    {
?>
        <div class="container" style="padding-bottom:20px ;">
            <a href="ajouterAnnonceRouter.php" class="btn btn-primary">Ajouter une annonce</a>
        </div>
    <?php
    }

    public function afficher_annonces_transp()
    {
        $homeController = new homeController();
        $annonces = $homeController->get_annonces_controller();

    ?>
        <div class="container">
            <!-- Ligne1 -->
            <div class="card-deck">
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[0]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[0]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[0]->image_path ?> class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[0]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[0]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[1]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[1]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[1]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[1]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[1]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[2]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[2]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[2]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[2]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[2]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[3]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[3]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[3]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[3]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[3]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ligne2 -->
            <div class="card-deck">
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[4]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[4]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[4]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[4]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[4]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[5]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[5]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[5]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[5]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[5]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php $id_annonce = $annonces[6]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[6]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[6]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[6]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[6]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <?php
                    $id_annonce = $annonces[7]->id_annonce;
                    if (isset($_SESSION['id_connected_user'])) {
                        $id_transporteur = $_SESSION['id_connected_user'];
                    }
                    $id_client = $annonces[7]->id_user;
                    ?>
                    <img src=<?php echo "img/" . $annonces[7]->image_path ?> class="card-img-top" alt="...">
                     <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $annonces[7]->titre ?></h5>
                        <p class="card-text"><?php echo get_premiers_mots($annonces[7]->texte) ?></p>
                        <div class="mt-auto">
                            <?php echo '<a class="suite" href="annonceRouter.php?id_annonce=' . $id_annonce . '">Lire la suite >></a>'; ?>
                            <?php echo '<a href=confirmPostulerRouter.php?id_client=' . $id_client . '&id_transporteur=' . $id_transporteur . '&id_annonce=' . $id_annonce . '" class="btn btn-dark">Postuler</a>'; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<?php
    }
}
