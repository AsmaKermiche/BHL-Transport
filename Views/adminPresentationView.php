<?php
require_once("headerView.php");
require_once("footerView.php");
class adminPresentationView
{
    public function afficher_admin_presentation_page()
    {
        $header = new headerView();
        $adminController = new adminController();
        $footer = new footerView();
        $presentation = $adminController->get_presentation_controller();
        $adminController->update_presentation_page_controller();
        $presentation = $adminController->get_presentation_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_admin_presentation($presentation);
        $footer->afficher_footer();
    }
    public function afficher_admin_presentation($presentation)
    {
    ?>
<div class="row">
    <div class="container">
        <?php if (isset($presentation)) : ?>
        <div class="form-container">
            <form method="post">
                <div style="padding-left: 20px; padding-right: 20px">
                    <div style="padding-bottom: 15px;">
                        <label class="mb-1">La description </label>
                        <textarea style="height: 120px;" class="form-control" placeholder="Entrez le contenu de votre annonce" name="content"><?=$presentation[0]->texte?></textarea>
                    </div>
                    <div class="custom-file" style="padding-bottom: 15px;">
                        <label class="custom-file-label">L'image</label>
                        <input class="custom-file-input" type="file" name="image" value="<?php echo $presentation[0]->image_path; ?>">
                    </div>
                    <div style="padding-bottom: 15px;"></div>
                    <div class="custom-file">
                        <label class="custom-file-label">La video</label>
                        <input class="custom-file-input" type="file" name="video" value="<?php echo $presentation[0]->video_path; ?>">
                    </div>
                    <div style="padding-bottom: 30px;"></div>
                    <button class="btn btn-primary" name="presentation" type="submit">Modifier le contenu</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
    }
}