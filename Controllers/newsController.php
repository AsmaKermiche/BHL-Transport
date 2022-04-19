<?php
require_once("Models/newsModel.php");
require_once("Models/homeModel.php");
require_once("Views/newsDetailsView.php");
require_once("Views/newsView.php");

Class newsController{
    public function afficher_news_page_controller(){
        $newsView = new newsView();
        $newsView->afficher_news_page();
    }
    public function afficher_news_details_page_controller(){
        if(isset($_GET['id_news'])){
            $id_news = $_GET['id_news'];
        }
        $newsView = new newsDetailsView();
        $newsView->afficher_news_details_page($id_news);
    }
    public function get_news_controller($id_news){
        $newsModel = new newsModel();
        $news = $newsModel->get_news_model($id_news);
        return $news;
    }
    public function get_all_news(){
        $homeModel = new homeModel();
        $news = $homeModel->get_news_model();
        return $news;
    }
}