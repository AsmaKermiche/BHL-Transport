<?php

Class newsDetailsView{
    public function afficher_news_details_page($id_news)
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_news_details($id_news);
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_news_details($id_news){
    $newsController = new newsController();   
    $news = $newsController->get_news_controller($id_news);
    ?>
    <div class="container">
    <h1> <?php echo $news[0]->titre?> </h1>
        <img src=<?php echo "img/" . $news[0]->image_path ?> class="img-fluid" alt="..." height="auto" width="45%">
    <p class="text-justify"> <?php echo $news[0]->texte?> </p>
    </div>
    <?php
    }
}
