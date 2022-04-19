<?php
require_once("headerView.php");
require_once("footerView.php");
class addNewsView
{

    public function afficher_admin_add_news_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_admin_add_news();
        $footer = new footerView();
        $footer->afficher_footer();
        $adminController = new adminController();
        $adminController->add_news_controller();
    }
    public function afficher_admin_add_news()
    {
    ?>
        <div class="container" style="max-width: 850px;">
            <div class="form-container">
                <form method="post">
                    <div class="form-group">
                        <label>Le titre du news</label>
                        <input class="form-control" type="text" placeholder="Entrez le point de départ" name="titre" />
                    </div>
                    <div class="form-group">
                        <label>Le contenu de votre news</label>
                        <textarea class="form-control" placeholder="Entrez le contenu de votre annonce" name="content" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label">Une image pour votre news</label>
                            <input class="custom-file-input" type="file" name="file">
                        </div>
                    </div>
                    <div style=" padding-left: 20px ">
                        <input type="submit" value="Ajouter" name="add_news" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
