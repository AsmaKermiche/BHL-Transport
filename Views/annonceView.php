<?php

class annonceView
{
    public function afficher_annonce_complete_page($id_annonce)
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_annonce_complete($id_annonce);
        $footer = new footerView();
        $footer->afficher_footer();
        $annonce = new annonceController();
        $annonce->ajouter_annonce_controller();
    }
    public function afficher_annonce_complete($id_annonce)
    {
        $annonceController = new annonceController();
        $annonce = $annonceController->get_annonce_complete_controller($id_annonce);
?>
        <div class="container">
        <h1> <?php echo $annonce[0]->titre ?> </h1>
            <img src=<?php echo "img/" . $annonce[0]->image_path ?> class="img-fluid" alt="..." height="auto" width="45%">
            <p> <?php echo $annonce[0]->texte ?> </p>
            <h3>Point de départ:</h3>
            <p><?php echo $annonce[0]->src ?> </p>
            <h3>Point d'arrivée</h3>
            <p><?php echo $annonce[0]->dest ?> </p>
            <h3>Type de transport</h3>
            <p><?php echo $annonce[0]->type ?> </p>
            <h3>Poids</h3>
            <p><?php echo $annonce[0]->poids ?> </p>
            <h3>Volume</h3>
            <p><?php echo $annonce[0]->volume ?> </p>
            <?php if (isset($_SESSION['id_connected_user'])) : ?>
                <?php
                $id_user = $annonce[0]->id_user;
                $user = $annonceController->get_user_by_id_controllerr($id_user);
                ?>
                <h3>Moyen de transport</h3>
                <p><?php echo $annonce[0]->moyen ?> </p>
                <h2>Détails du compte:</h2>
                <h3>Nom</h3>
                <p><?php echo $user[0]->nom ?> </p>
                <h3>Prénom</h3>
                <p><?php echo $user[0]->prenom ?> </p>
                <h3>Email</h3>
                <p><?php echo $user[0]->email ?> </p>
                <h3>Numéro du téléphone</h3>
                <p><?php echo $user[0]->numero_telephone ?> </p>
                <h3>Adresse principale</h3>
                <p><?php echo $user[0]->adresse_principale ?> </p>
            <?php endif; ?>
        </div>
<?php    }
}
