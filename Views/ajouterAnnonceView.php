<?php
require_once("headerView.php");
require_once("footerView.php");
class addAnnonceView
{

    public function afficher_add_annonce_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_add_form();
        $footer = new footerView();
        $footer->afficher_footer();
        $annonce = new annonceController();
        $annonce->ajouter_annonce_controller();
    }
    public function afficher_select_poids()
    {
        $annonce = new annonceController();
        $poids = $annonce->get_annonce_poids_controller();
?>
        <?php if (isset($poids)) : ?>
            <div class="form-group">
                <label>La fourchette du poids</label>
                <select name="poids" class="form-control">
                    <?php foreach ($poids as $row) : ?>
                        <option value="<?php echo $row->poids ?>"><?php echo $row->poids ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
    <?php
    }
    public function afficher_select_volume()
    {
        $annonce = new annonceController();
        $volumes = $annonce->get_annonce_volume_controller();
    ?>
        <?php if (isset($volumes)) : ?>
            <div class="form-group">
                <label>La fourchette du volume</label>
                <select name="volume" class="form-control">
                    <?php foreach ($volumes as $row) : ?>
                        <option value="<?php echo $row->volume ?>"><?php echo $row->volume ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
    <?php
    }
    public function afficher_select_moyen()
    {
        $annonce = new annonceController();
        $moyens = $annonce->get_annonce_moyen_controller();
    ?>
        <?php if (isset($moyens)) : ?>
            <div class="form-group">
                <label>La fourchette du moyen</label>
                <select name="moyen" class="form-control">
                    <?php foreach ($moyens as $row) : ?>
                        <option value="<?php echo $row->moyen ?>"><?php echo $row->moyen ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
    <?php
    }

    public function afficher_add_form()
    {
    ?>
        <div class="container" style="max-width: 850px;">
            <div class="form-container">
                <form method="post">
                    <div class="form-group">
                        <label>Le point de départ</label>
                        <input class="form-control" type="text" placeholder="Entrez le point de départ" name="depart" />
                    </div>
                    <div class="form-group">
                        <label>Le point d'arrivée</label>
                        <input class="form-control" type="text" placeholder="Entrez le point d'arrivée" name="arrivee" />
                    </div>
                    <div class="form-group">
                        <label>Le type de transport</label>
                        <input class="form-control" type="text" placeholder="Entrez ce que vous voulez transporter (lettre, colis, meuble, électroménager, déménagement...)" name="type_transport" />
                    </div>
                    <?php echo $this->afficher_select_poids(); ?>
                    <?php echo $this->afficher_select_volume(); ?>
                    <?php echo $this->afficher_select_moyen(); ?>
                    <div class="form-group">
                        <label>Un titre pour votre annonce</label>
                        <input class="form-control" type="text" placeholder="Entrez un titre pour votre annonce" name="titre" />
                    </div>
                    <div class="form-group">
                        <label>Le contenu de votre annonce</label>
                        <textarea class="form-control" placeholder="Entrez le contenu de votre annonce" name="content" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label">Une image pour votre annonce</label>
                            <input class="custom-file-input" type="file" name="file">
                        </div>
                    </div>
                    <div style=" padding-left: 20px ">
                        <input type="submit" value="Publier mon annonce" name="submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
