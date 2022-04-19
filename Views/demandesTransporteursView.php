<?php
require_once("headerView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");

class demandesAnnoncesView
{

    public function afficher_demande_confirmation_transporteur_page()
    {
        $header = new headerView();
        $annonceController = new annonceController();
        $annonces_postules = $annonceController->get_demandes_confirmation_transporteurs_postule_controller();
        $annonces_contactes = $annonceController->get_demandes_confirmation_transporteurs_contact_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        ?> <h3 class='text-center'>Confirmez les annonces à lequelles vous avez postulé: </h3> <?php
        $this->afficher_demande_confirmation_transporteur($annonces_postules);
        ?> <h3 class='text-center'>Vous êtes contactés pour ces annonces: </h3> <?php
        $this->afficher_demande_confirmation_transporteur($annonces_contactes);
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_demande_confirmation_transporteur($annonces)
    {
        

?>
<div class="row">
    <div class="container">
        <div class="card-deck">
            <?php if (isset($annonces)) : ?>
            <?php foreach ($annonces as $row) : ?>
            <div class="card shadow-sm mb-4">
                <?php $id = $row->id_annonce; ?>
                <img src=<?php echo "img/" . $row->image_path ?> class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $row->titre ?></h5>
                    <p class="card-text"><?php echo get_premiers_mots($row->texte) ?></p>
                    <div class="mt-auto">
                        <?php echo '<a class="mt-auto" href="annonceRouter.php?id_annonce=' . $id . '">Lire la suite >></a>'; ?>
                        <?php echo '<a href="confirmTransactionRouter.php?id_annonce=' . $id . '" class="btn btn-success">Confirmer</a>'; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    }
}