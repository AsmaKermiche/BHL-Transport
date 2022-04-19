<?php
require_once("headerView.php");
require_once("footerView.php");
Class presentationView{
    public function afficher_presentation_page()
    {
        $presentationController = new presentationController();
        $presentation = $presentationController->get_presentation_controller();
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_presentation_image($presentation);
        $this->afficher_presentation_texte($presentation);
        $this->afficher_presentation_video($presentation);
        $footer = new footerView();
        $footer->afficher_footer();
        
    }
    public function afficher_presentation_image($presentation){
        ?>
        <div class="container">
        <img src="<?php echo "img/".$presentation[0]->image_path?>" class="img-fluid" alt="" width="45%">
        </div>
        <?php
    }
    public function afficher_presentation_texte($presentation)
    {
        ?>
        <div class="container">
        <p><?php echo nl2br($presentation[0]->texte)?> </p>
        </div>
        <?php
    }
    public function afficher_presentation_video($presentation)
    {
        ?>
        <div class="container">
        <video preload="auto" controls autoplay>
        <source src="<?php echo "img/".$presentation[0]->video_path?>" type= "video/mp4"/>
        </video>
        </div>
        <?php
    }
}