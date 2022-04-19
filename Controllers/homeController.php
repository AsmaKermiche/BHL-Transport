<?php
require_once("Models/homeModel.php");
require_once("Views/homeView.php");
require_once("Views/searchView.php");


Class homeController{
    public function afficher_home_page_controller(){
        $homeView = new homeView();
        $homeView->afficher_home_page();
    }
    public function get_annonces_controller(){
        $homeModel = new homeModel();
        $annonces = $homeModel->get_annonces_model();
        return $annonces;
    }
    public function get_annonces_search_controller(){
        $homeModel = new homeModel();
        $annonces = $homeModel->get_annonces_search_model($_POST);
        return $annonces;
    }
    public function afficher_recherche_page_controller(){
        $searchView = new searchView();
        $searchView->afficher_search_page();
    }
    public function get_diaporama_controller(){
        $homeModel = new homeModel();
        $diapo = $homeModel->get_news_model();
        return $diapo;
    }

}